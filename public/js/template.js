; (function () {
    // $(window).scroll(function () {
    //     var window_scrollTop = $(window).scrollTop();
    
    //     if (window_scrollTop > 50) {
    //         $('#goTop').css({
    //             "opacity": "1",
    //             "pointer-events": "unset"
    //         })
    
    //     } else {
    //         $('#goTop').css({
    //             "opacity": "0",
    //             "pointer-events": "none"
    //         })
    //     }
    // })

    $('.hamburg').click(function(){
        $('.hamburg').toggleClass('active')
        $('#hamburgLink').toggleClass('active')
    })
    $('.hamburgMask').click(function(){
        $('.hamburg').toggleClass('active')
        $('#hamburgLink').toggleClass('active')
    })
    // 頁尾下拉選單
    $('.optionStyle').hover(function(){
        $(this).attr("background-color","#ECFFE6");;
    })
    
    $('.selectStyle').click(function(){
        $(this).toggleClass('active')
    })
    
    $('.optionStyle').click(function(){
        let value = $(this).children('.card').text()
        $('.selectArea').find('#inputValue').val(value) 
        $('.selectStyle').text(value)
        $('.selectStyle').click()
    })

    var dd = document.querySelectorAll('.drop-down')

    dd.forEach(element => {
        element.onclick = function () {
            element.classList.toggle('active')
        }
    });
})()

