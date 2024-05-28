import {skillHandler, expHandler} from "./helper.js"
$(document).ready(() => {
    skillHandler()
    expHandler()
    $("#add-edu-btn").click(function(){
        const institute = $("#institute").val()
        const degree = $("#degree").val()
        const location = $("#ins-location").val()
        const marks = $("#marks").val()
        const yearOfPassing = $("#yop").val()
        
        $('#upd-edu').append(`
        <div class="card p-2 position-relative">
        <h4>${institute}, ${location}</h4>
        <h6>${degree} - ${yearOfPassing}</h6>
        <p>Result - ${marks}</p>
        <button type="button" class="btn btn-close btn-sm position-absolute top-0 end-0 remove-edu"></button>
        <input type="hidden" name="institute[]" value="${institute}">
        <input type="hidden" name="ins_location[]" value="${location}">
        <input type="hidden" name="degree[]" value="${degree}">
        <input type="hidden" name="yop[]" value="${yearOfPassing}">
        <input type="hidden" name="marks[]" value="${marks}">
        </div>
        `)

        $(".remove-edu").click(function() {
            $(this).parent().remove()
        })
    })
})