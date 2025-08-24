$( document ).ready(function() {
    $('.click_modal').click(function () {
        var nametitle = $(this).data('nametitle');
        var description = $(this).data('description');
        var price = $(this).data('price');
        var age = $(this).data('age');
        var count = $(this).data('count');
        var time = $(this).data('time');
        var date = $(this).data('date');
        var img = $(this).data('img');
        const nametitle_inner = document.getElementById("nametitle_inner");
        const description_inner = document.getElementById("description_inner");
        const price_inner = document.getElementById("price_inner");
        const age_inner = document.getElementById("age_inner");
        const count_inner = document.getElementById("count_inner");
        const time_inner = document.getElementById("time_inner");
        const date_inner = document.getElementById("date_inner");
        const img_inner = document.getElementById("img_inner");
        nametitle_inner.innerText = nametitle;
        description_inner.innerText = description;
        price_inner.innerText = price;
        age_inner.innerText = age;
        count_inner.innerText = count;
        time_inner.innerText = time;
        date_inner.innerText = date;
        img_inner.setAttribute("style","background-image:url('"+img+"')");
    });
});
