export const skillHandler = () => {
    $("#skill-add-btn").click(function () {
        const skillInput = $("#skill-input").val();
        $("#skills").append(`
        <div class="badge text-bg-primary my-1">${skillInput}
        <input type="hidden" name="skill[]" value="${skillInput}">
        <button type="button" class="btn btn-close btn-sm remove-skill"></button>
        </div>
        `);

        $(".remove-skill").click(function () {
            $(this).parent().remove();
        });
    });
};

export const expHandler = () => {
    $("#add-exp-btn").click(function(){
        const position = $("#position").val()
        const companyName = $("#comp-name").val()
        const desc = $("#desc").val()
        const startDate = $("#start-date").val()
        const endDate = $("#end-date").val()
        
        $('#exp').append(`
        <div class="card p-2 position-relative">
        <h4>${position}</h4>
        <h6>${companyName} - ${startDate} to ${endDate}</h6>
        <p>${desc}</p>
        <button type="button" class="btn btn-close btn-sm position-absolute top-0 end-0 remove-edu"></button>
        <input type="hidden" name="position[]" value="${position}">
        <input type="hidden" name="company[]" value="${companyName}">
        <input type="hidden" name="description[]" value="${desc}">
        <input type="hidden" name="start_date[]" value="${startDate}">
        <input type="hidden" name="end_date[]" value="${endDate}">
        </div>
        `)
    })
}
