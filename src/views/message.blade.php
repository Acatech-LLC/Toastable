<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

.toastable {
    font-family: "Roboto", sans-serif;
    padding: 11px 30px;
    border-radius: 4px;
    font-weight: 400;
    position: fixed;
    top: 30px;
    right: 20px;
    font-size: 16px;
    color: #fff;
}

.toastable--success {
    background-color: #198753;
    color: #fff;
}

.toastable--warning {
    color: #FFC007;
    background-color: #fcf8e3;
    border-color: #faebcc;
}

.toastable--muted {
    background: #eee;
    color: #3a3a3a;
    border: 1px solid #e2e2e2;
}

.toastable--muted-dark {
    background: #133259;
    color: #e2e1e7;
}

.toastable--info a,
.toastable--primary-dark a {
    color: #fff;
}

.toastable--error {
    background: #DC3444;
    color: #fff;
}

.toastable--primary {
    background: #573e81;
}

.toastable--primary-dark {
    background: linear-gradient(to right, #133259 30%, #0d233e);
}

.toastable--info {
    background: #00baf3;
}

.toastable > ul {
    padding-left: 15px;
}

.toastable > p:only-of-type {
    margin-bottom: 0;
}

.toastable i {
    margin-right: 8px;
    position: relative;
    top: 6px;
}

.toastable .toastable__body {
    color: inherit;
}

@media only screen and (max-width:1050px) {
    .toastable {
        text-align: center;
        right: 0;
        left: 50%;
        width: 300px;
        margin-left: -150px;
    }
}
</style>

<script>
    // function toastable(message, link) {
    //     var template = $($("#toastable-template").html());
    //     $(".toastable").remove();
    //     template.find(".toastable__body").html(message).attr("href", link || "#").end()
    //      .appendTo("body").hide().fadeIn(300).delay(2800).animate({
    //         marginRight: "-100%"
    //     }, 300, "swing", function() {
    //         $(this).remove();
    //     });
    // }

// create the same function with just js
function toastable(message, link) {
    var template = document.createElement("div");
    template.className = "toastable";
    if(link == null) {
        template.innerHTML = '<p class="toastable__body">' + message + "</p>";
    } else {
        template.innerHTML = '<a href="' + link + '" class="toastable__body">' + message + "</a>";
    }
    document.body.appendChild(template);
    setTimeout(function() {
        template.style.marginRight = "-100%";
        setTimeout(function() {
            template.remove();
        }, 300);
    }, 2800);
}

</script>

@if(Session::has('toastable_notification.message'))
<script id="toastable-template" type="text/template">
    <div class="toastable toastable--{{ Session::get('toastable_notification.type') }}">
        <a href="#" class="toastable__body" target="_blank"></a>
    </div>
</script>

<script>
    toastable("{{ Session::get('toastable_notification.message') }}", "{{ Session::get('toastable_notification.link') }}");
</script>
@endif