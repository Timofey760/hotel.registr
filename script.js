
// Создаем новый элемент абзаца
var paragraph = document.getElementById('info01')
// Устанавливаем текст абзаца
paragraph.innerHTML = `Elysium Hotel на Пушкинской – это уютный мини-отель c возможностью почасовой оплаты!<br>
                       Мы гарантируем Вам комфорт и полную конфиденциальность встреч, и всё это по выгодной цене.<br>
                       Номера Elysium Hotel на Пушкинской оборудованы всем необходимым для вашего отдыха: удобной мягкой мебелью,<br>
                       душем, кондиционером, телевизором, Wi-Fi, мини-баром.`;
// Устанавливаем стиль для центрирования текста
paragraph.style.textAlign = "center";
// Добавляем абзац в элемент с id="content"
document.getElementById("content").appendChild(paragraph);






/*// Создаем новый элемент абзаца
var paragraph = document.getElementById('info01')
var paragraph = document.createElement('p');
paragraph.id = 'info01'; // Устанавливаем id для абзаца*/
// Устанавливаем текст абзаца
/*paragraph.innerHTML = `Elysium Hotel на Пушкинской – это уютный мини-отель c возможностью почасовой оплаты!<br>
                       Мы гарантируем Вам комфорт и полную конфиденциальность встреч, и всё это по выгодной цене.<br>
                       Номера Elysium Hotel на Пушкинской оборудованы всем необходимым для вашего отдыха: удобной мягкой мебелью,<br>
                       душем, кондиционером, телевизором, Wi-Fi, мини-баром.`;
        Добавляем абзац в элемент с id="content"
        document.getElementById("content").appendChild(paragraph);*/


// document.getElementById('bookingForm').addEventListener('submit', 
// function (event) {
//     event.preventDefault();

//     var formData = new FormData(this);
//     console.log(formData);
//     fetch('booking.php', {
//         method: 'POST',
//         body: formData
//     })
//         .then(response => response.json())
//         .then(data => {
//             if (data.success) {
//                 alert('Бронирование успешно!');
//             } else {
//                 alert('Ошибка бронирования: ' + data.message);
//             }
//         })
//         .catch(error => {
//             console.error('Error:', error);
//         });
// });
