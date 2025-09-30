function Script(params) {
  this.areaId = params.areaId;
  this.url = params.url;
  $(this.init.bind(this));
}
Script.prototype = {
  init: function() {



//     $url=this.url;

// console.log($url);

// const self = this;
// $('#ajaxForm').on('click', (e) => {
//     e.preventDefault(); // Предотвратить стандартное поведение кнопки/формы

//     var dataId = $(e.currentTarget).data('id'); // получаем id
//     var formData = new FormData(); // создаем объект FormData

//     formData.append('id', dataId); // добавляем нужное значение

//     // Добавляем sessid из глобальной функции Bitrix
//     formData.append('sessid', BX.bitrix_sessid());

//     $.ajax({
//         type: 'POST',
//         url: self.url, // Путь к обработчику
//         data: formData,
//         contentType: false,
//         processData: false,
//         success: function(response) {
//             // Обработка успешного ответа
//         },
//         error: function() {
//             $('#response').html('Ошибка при отправке данных.');
//         }
//     });
// });




  },
};