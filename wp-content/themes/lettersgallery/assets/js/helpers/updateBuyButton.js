function updateBuyButton(cartAction, $this){
    if (cartAction === "add") {
        $this.text($this.data("delete"));
        $this.data("action", "delete");
        $this.attr("data-action", "delete");
    } else {
        $this.text($this.data("add"));
        $this.data("action", "add");
        $this.attr("data-action", "add");
    }
}

export default updateBuyButton