$(document).ready(function () {
    /* Переменная-флаг для отслеживания того, происходит ли в данный момент ajax-запрос. В самом начале даем ей значение false, т.е. запрос не в процессе выполнения */
    var inProgress = false;
    /* С какой статьи надо делать выборку из базы при ajax-запросе */
    var startFrom = 3;
    $(window).scroll(function () {
        /* Если высота окна + высота прокрутки больше или равны высоте всего документа и ajax-запрос в настоящий момент не выполняется, то запускаем ajax-запрос */
        if ($(window).scrollTop() + $(window).height() >= $(document).height() && !inProgress) {
            $.ajax({
                /* адрес файла-обработчика запроса */
                url: 'ajax.php',
                /* метод отправки данных */
                method: 'POST',
                /* данные, которые мы передаем в файл-обработчик */
                data: {
                    "startFrom": startFrom
                },
                /* что нужно сделать до отправки запрса */
                beforeSend: function () {
                    /* меняем значение флага на true, т.е. запрос сейчас в процессе выполнения */
                    inProgress = true;
//                    console.log('beforeSend');
                },
                /* что нужно сделать */
                success: function (response) {
                    /* Преобразуем результат, пришедший от обработчика - преобразуем json-строку обратно в массив */
                    data = jQuery.parseJSON(response);
//                    console.log(data);
                    /* Если массив не пуст (т.е. статьи там есть) */
                    if (data.length > 0) {
                        /* Делаем проход по каждому результату, оказвашемуся в массиве,
                        где в index попадает индекс текущего элемента массива, а в data - сама статья */
                        $.each(data, function (index, data) {
                            /* Отбираем по идентификатору блок со статьями и дозаполняем его новыми данными */
                            $("<div id='articles'><h4 class='headline'><b>"+data.Headline+"</b></h4><p class='text'>"+data.Text.slice(0, 400) + "..."+"</p><p class='date'>"+data.Date+"</p><form method='post' action='btnClick.php'><button type='submit' class='btn' name='id' value='"+data.NewsId+"'>Подробнее</button></form></div>").appendTo($("#maindiv"));
                            /* По факту окончания запроса снова меняем значение флага на false */
                            inProgress = false;
                            // Увеличиваем на 1 порядковый номер статьи, с которой надо начинать выборку из базы
                            startFrom += 1;
                        });
                    }
                }
            });
        }
    });
});
