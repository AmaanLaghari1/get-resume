import {skillHandler, expHandler, eduHandler} from "./helper.js"
$(document).ready(() => {
    skillHandler()
    expHandler()
    eduHandler()

    $(".remove-edu").click(function() {
        $(this).parent().remove()
    })
})