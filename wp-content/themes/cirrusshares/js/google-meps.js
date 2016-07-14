/**
 * Created by stiven90 on 26.02.16.
 */
function initialize() {
    var center = {lat: 50.00, lng: 25.50}; // Центр мапи: географічна широта і довгота
    var markers = [  // Точки, в яких будемо ставити позначки
        {
            "title": 'Львів', // Назва (підказка, що випливає при наведенні курсора миші)
            "lat": '49.840221', // Географічна широта
            "lng": '24.017666', // Географічна довгота
            "description": 'славне місто Львів', // Текст для інформаційного віконця
            "mark": true, // Ознака - встановлювати позначку в цій точці
            "forpath": true // Ознака - використовувати точку для прокладання маршруту
        },
        {
            "title": 'Золочів',
            "lat": '49.810612',
            "lng": '24.895924',
            "description": 'місто Золочів',
            "mark": true,
            "forpath": false
        },
        {
            "title": 'Тернопіль',
            "lat": '49.541226',
            "lng": '25.597669',
            "description": 'файне місто Тернопіль',
            "mark": true,
            "forpath": false
        },
        {
            "title": 'Волочиськ',
            "lat": '49.526194',
            "lng": '26.164845',
            "description": 'Волочиськ',
            "mark": true,
            "forpath": false
        },
        {
            "title": 'Хмельницький',
            "lat": '49.412735',
            "lng": '26.992933',
            "description": 'Проскурів-Хмельницький',
            "mark": true,
            "forpath": true
        },
        {
            "title": 'Старокостянтинів',
            "lat": '49.760959',
            "lng": '27.214039',
            "description": 'місто Старокостянтинів',
            "mark": true,
            "forpath": false
        },
        {
            "title": 'Шепетівка',
            "lat": '50.181513',
            "lng": '27.049407',
            "description": 'місто Шепетівка',
            "mark": true,
            "forpath": true
        }

    ];

    // Параметри мапи
    var mapOptions = {
        center: center, // Центр
        zoom: 8         // Масштаб
    };

    // Завантаження мапи - змінна map зберігає посилання на нашу карту
    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

    var latlngbounds = new google.maps.LatLngBounds(); // Об’єкт для корекції прив’язки
    var infoWindow = new google.maps.InfoWindow(); // Об’єкт - інформаційне віконце
    var lat_lng = new Array(); // Масив, в який ми відберемо лише ті точки, що використовуються для прокладання маршруту

    // Перебір масиву точок
    for (var i = 0; i < markers.length; i++) {
        var data = markers[i];
        var myLatlng = new google.maps.LatLng(data.lat, data.lng); // Створюємо об’єкт - точка на мапі

        if (data.mark) { // Якщо потрібно - встановлюємо маркер (позначку)
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title
            });
            latlngbounds.extend(marker.position);

            // Встановлення обробника події 'click' для відображення інформаційного віконця
            // В кожній ітерації для створюваної функції-обробника треба зберігати копії об’єктів marker і data
            // Для цього застосовуємо "вираз з функцією негайного виконання" (IIFE or IEFE)
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent(data.description);
                    infoWindow.open(map, marker);
                });
            })(marker, data); // Передача актуальних параметрів в кожній ітерації
        }

        if (data.forpath) { // Якщо точка має брати участь в прокладені маршруту, зберігаємо її в масиві lat_lng
            lat_lng.push(new google.maps.LatLng(data.lat, data.lng));
        }
    }
    // Автокорекція центру і прив’язки відповідно до створених позначок
    map.setCenter(latlngbounds.getCenter());
    map.fitBounds(latlngbounds);

    // Прокладання маршруту
    var path = new google.maps.MVCArray(); // Об’єкт для зберігання даних маршруту
    var service = new google.maps.DirectionsService(); // Об’єкт для виклику служби Google Direction Service
    var poly = new google.maps.Polyline({ // Об’єкт, що креслить
        map: map,
        strokeColor: '#F3443C' // Колір "олівця"
    });

    // Перебір масиву точок, відібраних для креслення
    for (var i = 0; i < lat_lng.length; i++) {
        (function(i) { // для того, щоб функція setTimeout працювала в циклі,
            // її також необхідно обгорнути у "вираз з функцією негайного виконання"
            if ((i+1) < lat_lng.length) { // опрацьовується пара точок в кожній ітерації, i-та та (i+1)-ша,
                // тому останню ітерацію пропускаємо
                var src = lat_lng[i]; // початок ділянки шляху
                var des = lat_lng[i+1]; // кінець ділянку шляху

                window.setTimeout(function() {
                    // Виклик Google Direction Service
                    service.route({
                        origin: src,
                        destination: des,
                        travelMode: google.maps.DirectionsTravelMode.DRIVING
                    }, function(result, status) { // Отримання результату
                        if (status == google.maps.DirectionsStatus.OK) {
                            // Якщо відповідь нормальна, опрацьовуємо її
                            for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                                // Зберігаємо точки, по яких треба креслити
                                path.push(result.routes[0].overview_path[i]);
                            }
                            poly.setPath(path); // і креслимо
                        }
                    });
                }, i * 700); // викликаємо із затримкою 0.7 секунди на кожній ітерації
            }
        })(i); // передаємо актуальне значення лічильника циклу
    }

    // Коли настане подія 'idle' - сховати повідомлення про те, що мапа завантажується
    google.maps.event.addListenerOnce(map, 'idle', function(){
        document.getElementById("splash").style.visibility = 'hidden';
    });
}
google.maps.event.addDomListener(window, 'load', initialize);