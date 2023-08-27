function isValidURL(string) {
    var res = string.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
    return (res !== null)
};

$('.full_url').on("change keyup paste", function () {
    if ($(this).val()) $('.icon-paper-plane').addClass("next");
    else $('.icon-paper-plane').removeClass("next");
});

$('.next-button').hover(function () {
    $(this).css('cursor', 'pointer');
});

$('.next-button.full_url').click(function () {

    let status = $(this).data();
    if (!status.enabled) return;

    let url = $("input.full_url").val();
    if (!isValidURL(url)) return new Swal("URL Inválida", "Insira uma URL válida para encurtar!", "error");


    $(this).data("enabled", 0);
    let sender_content = $(this).html();
    $("input.full_url").prop("disabled", true);

    $(this).html(`<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>`);
    return;

    $('.full_url-section').addClass("fold-up");
    $('.shortened-url-section').removeClass("folded");
});

$('.next-button').hover(function () {
    $(this).css('cursor', 'pointer');
});

$(".next-button.refresh").click(() => {

})