import refs from "./refs"

let masks = {};
const {popupForm} = refs

const telInput = popupForm.find("input[type='tel']");
const postCodeInput = popupForm.find("input[name='post_code']");

telInput.intlTelInput({
    geoIpLookup: function (callback) {
        $.get("http://ipinfo.io", function () {
        }, "jsonp").always(function (resp) {
            var countryCode = (resp && resp.country) ? resp.country : "";
            callback(countryCode);
        });
    },
    initialCountry: "US",
    preferredCountries: ['US', "AU", "DE", "FR", "IT", "UA"],
    excludeCountries: ['RU', "BY"],
    separateDialCode: true
});

// Отримання країни за допомогою intlTelInput
const selectedCountry = telInput.intlTelInput('getSelectedCountryData');
const dialCode = selectedCountry.dialCode;
let maskNumber = intlTelInputUtils.getExampleNumber(selectedCountry.iso2, 0, 0);

if (maskNumber) {
    maskNumber = intlTelInputUtils.formatNumber(maskNumber, selectedCountry.iso2, 2);
    maskNumber = maskNumber.replace('+' + dialCode + ' ', '');
    const mask = maskNumber.replace(/[0-9+]/ig, '0');

    telInput.mask(mask, {placeholder: maskNumber});
    masks[telInput.attr('id')] = mask;
}

// Обробник події countrychange
telInput.on('countrychange', function (e) {
    const selectedCountry = telInput.intlTelInput('getSelectedCountryData');
    const dialCode = selectedCountry.dialCode;
    let maskNumber = intlTelInputUtils.getExampleNumber(selectedCountry.iso2, 0, 0);

    telInput.val('');

    if (maskNumber) {
        maskNumber = intlTelInputUtils.formatNumber(maskNumber, selectedCountry.iso2, 2);
        maskNumber = maskNumber.replace('+' + dialCode + ' ', '');
        const mask = maskNumber.replace(/[0-9+]/ig, '0');

        telInput.mask(mask, {placeholder: maskNumber});
        masks[telInput.attr('id')] = mask;
    }
});