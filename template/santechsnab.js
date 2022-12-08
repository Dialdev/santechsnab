$(function() {
    function t() {
        next = $(".banner .active").fadeOut().removeClass("active").next("a"),
        next.length ? next.fadeIn().addClass("active") : $(".banner a:first").fadeIn().addClass("active")
    }
    $(".lb").lightBox(),
    $(".close").click(function() {
        $(".popup_bg").fadeOut().remove()
    }),
    $("#catalog ul li.active .more_menu").addClass("active"),
    $(".more_menu").click(function() {
        obj = $(this).parent().find("ul"),
        obj.slideToggle("slow"),
        $(this).toggleClass("active")
    }),
    $("#right").click(function() {
        "0px" == $(".long_block").css("left") && $(".long_block").animate({
            left: "-175px"
        }, 1e3, function() {
            $(".long_block").css("left", "0px"),
            $(".long_block .special:first").detach().appendTo(".long_block")
        })
    }),
    $("#left").click(function() {
        "0px" == $(".long_block").css("left") && ($(".long_block").css("left", "-175px"),
        $(".long_block .special:last").detach().prependTo(".long_block"),
        $(".long_block").animate({
            left: "0px"
        }, 1e3))
    }),
    $(".r").click(t),
    $(".l").click(function() {
        prev = $(".banner .active").fadeOut().removeClass("active").prev("a"),
        prev.length ? prev.fadeIn().addClass("active") : $(".banner a:last").fadeIn().addClass("active")
    }),
    setInterval(t, 5e3),
    /*$(".add_to_basket").click(function() {
        data = {},
        count = $(this).parent().parent().find(".count"),
        data[count.attr("data-id")] = count.val(),
        //console.log(data);
        count = count.val() - 0,
        $.ajax({
            type: "POST",
            url: "ajax",
            data: {
                add: 1,
                data: data
            },
            success: function() {
                $(".basket_message").fadeIn("fast"),
                setTimeout(function() {
                    $(".basket_message").fadeOut("fast")
                }, 1e3)
            }
        }),
        $("#basket span").text($("#basket span").text() - 0 + count)
    }),*/
$( "body" ).on( "click", ".catalog_section__buy_btn", function() {
    var ask_price = $(this).find('.ask-price');
    //console.log(ask_price);
    if(ask_price.length > 0){
        return false;
    }
    data = {},
        count = $(this).parent().find(".count"),
        data[count.attr("data-id")] = count.val(),
        // console.log($(this).parent());
        count = count.val() - 0,
        $.ajax({
            type: "POST",
            url: "basket/ajax/",
            data: {
                add: 1,
                data: data
            },
            success: function() {
                console.log('success');
                $(".basketpopup").fadeIn("fast"),
                setTimeout(function() {
                    $(".basketpopup").fadeOut("fast")
                }, 3000)
            }
        }),
        $("#basket span").text($("#basket span").text() - 0 + count);
        //console.log(data);
});




    $(".mass_add_to_basket").click(function() {
        data = {},
        count = 0,
         counts = $(".checkbox:checked").parent().prev().children(".count"),
        
        0 != counts.length && (counts.each(function() {
            data[$(this).attr("data-id")] = $(this).val(),
            count += $(this).val() - 0
        }),
        $.ajax({
            type: "POST",
            url: "basket/ajax/",
            data: {
                add: 1,
                data: data
            },
            success: function() {
                $(".basket_message").fadeIn("fast"),
                setTimeout(function() {
                    $(".basket_message").fadeOut("fast")
                }, 1e3)
            }
        }),
        $("#basket span").text($("#basket span").text() - 0 + count))
    }),
    $(".to_basket span").click(function() {
        data = {},
        count = $(this).parent().find("input").val(),
        data[$(this).parent().find("input").attr("data-id")] = count,
        $.ajax({
            type: "POST",
            url: "basket/ajax/",
            data: {
                add: count,
                data: data
            },
            success: function() {
                $(".basket_message").fadeIn("fast"),
                setTimeout(function() {
                    $(".basket_message").fadeOut("fast")
                }, 1e3)
            }
        }),
        $("#basket span").text($("#basket span").text() - 0 + (count - 0)),
        $(".basketpopup").fadeOut()
    }),

    //Кнопка "Купить" на детальной - начало
    $( "body" ).on( "click", ".buy.item", function() {
        var item_price = $(this).data("price");
        if(item_price == ""){
            alert('Товара нет в наличии!');
            return false;
        }
        data = {},
            // count = $(this).parent().find(".count"),
            count = 1,
            data[$(this).data("id")] = count,
            console.log(data),
            
            $.ajax({
                type: "POST",
                url: "basket/ajax/",
                data: {
                    add: 1,
                    data: data
                },
                success: function() {
                    $(".basket_message").fadeIn("fast"),
                    setTimeout(function() {
                        $(".basket_message").fadeOut("fast")
                    }, 1e3)
                }
            }),
            $("#basket span").text($("#basket span").text() - 0 + count)
    });

    //Кнопка "Купить" на детальной - окончание

    $(".buy").click(function() {
        $(".basketpopup").fadeOut(),
        $(this).parent().next(".basketpopup").fadeIn()
        // $("#basketpopup").fadeIn();
    }),
    $(".ord_link").click(function(t) {
        t.preventDefault(),
        $(this).parent().find(".to_basket span").click(),
        setTimeout(function() {
            location.href = "/basket.html"
        }, 2e3)
    }),
    $(".basketpopup_close").click(function() {
        $(this).parent().fadeOut()
    }),
    $("#basket_table input").change(function() {
        if (0 != $(this).val()) {
            price = $(this).parent().next().text(),
            $(this).parent().next().next().text(($(this).val() * price).toFixed(2));
            t = 0;
            $(".summ_val").each(function() {
                row_summ = $(this).text(),
                t = 1 * row_summ - 0 + 1 * t
            }),
            $("#total_summ span").text(t.toFixed(2)),
            change = $(this).val() - $(this).attr("data-value"),
            $("#basket span").text($("#basket span").text() - 0 + change),
            $(this).attr("data-value", $(this).val()),
            data = {},
            data[$(this).attr("data-id")] = change,
            $.ajax({
                type: "POST",
                url: "basket/ajax/",
                data: {
                    add: 1,
                    data: data
                }
            })
        } else {
            price = $(this).parent().next().text(),
            $("#basket span").text($("#basket span").text() - $(this).attr("data-value")),
            $.ajax({
                type: "POST",
                url: "basket/ajax/",
                data: {
                    remove: 1,
                    id: $(this).attr("data-id")
                }
            }),
            $(this).parent().parent().parent().parent().remove();
            var t = 0;
            $(".summ_val").each(function() {
                row_summ = $(this).text(),
                t = 1 * row_summ - 0 + 1 * t
            }),
            $("#total_summ span").text(t.toFixed(2)),
            $(".content").find("#basket_table").length < 1 && ($(".basket_content").empty(),
            $(".basket_content").html('<h2>Ваша корзина пуста.<br> Для заказа товара перейдите в <a href="katalog.html">каталог</a></h2>'))
        }
    }),
    $("#basket_table .delete").click(function() {
        $(this).parent().prev().prev().prev().children("input").val(0).change()
    }),
    $(".minus").click(function() {
        count = $(this).next().val(),
        $(this).next().val(count - 1).change()
    }),
    $(".plus").click(function() {
        count = $(this).prev().val(),
        $(this).prev().val(parseFloat(count) + 1).change()
    })
}),
$(function() {
    $('.js-show-feedback').click(function(){
        $('.header-feedback__modal').fadeIn(),
        $('.black_block').fadeIn();
    });

    $(".letter").click(function() {
        $(".map-feedback").fadeIn(),
        $(".black_block").fadeIn()
        /*$(this).hasClass("ask-price") && (item = $(this).parent().parent().find("td").eq(0).text(),*/
        /*$(this).hasClass("ask-price") && (item = $(this).attr("rel"),*/
        /*console.log(item),*/
        /*$(".map-feedback textarea").val("Запрос цены товара: " + item))*/
    }),
      
    $(".black_block,.modal .close").click(function() {
        $(".modal").fadeOut(),
        $(".black_block").fadeOut()
    }),
    setTimeout(function() {
        $(".message_success").fadeOut()
    }, 5e3),
    $(".town_kontakt").first().css("display", "block"),
    $(".town").click(function() {
        obj = $(this),
        num = obj.index(),
        obj_s = $(".town_kontakt"),
        obj.hasClass("active") || ($(".town").removeClass("active"),
        obj.addClass("active"),
        obj_s.hide(),
        obj_s.eq(num).toggle())
    }),
    $(window).bind("scroll", function() {
        $(this).scrollTop() > 240 ? $("#basket").hasClass("basket-fix") || $("#basket").addClass("basket-fix") : $("#basket").hasClass("basket-fix") && $("#basket").removeClass("basket-fix")
    })
});



jQuery(document).ready(function() {
$(".map-feedback .submit").on("mouseover", function () {
       /*alert("oxxxxx");*/
       let date = new Date();
       var now = date.getTime();
       $(".map-feedback .no-na-nams").val(now);
       return true;
})
$("#callbackForm .submit").on("mouseover", function () {
       /*alert("oxxxxx");*/
       let date = new Date();
       var now = date.getTime();
       $("#callbackForm .no-na-nams").val(now);
       return true;
})
});


function OPSS(vals){
    /*alert("opss!!");*/
    $(".map-feedback").fadeIn(),
    $(".black_block").fadeIn();
    var item=vals;
    $(".map-feedback textarea").val("Запрос цены товара: " + item);
}

