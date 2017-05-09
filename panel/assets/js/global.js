var url_ctx = '/yourprofi/panel/';
function edit(obj, callback) {
    var form = $('#' + callback + 'Form');
    var row = $(obj).parents("tr");
    form.children("#id").val(row.data('id'));
    row.children("td").each(function(index) {
        if (typeof $(this).data('form') !== 'undefined') {
            if (typeof $(this).data('val') !== 'undefined') {
                var value = $(this).data('val');
                var editForm = form.find('#' + $(this).data('form'));
                if (value.toString().substr(0, 1) == '[')
                    editForm.val(JSON.parse(value));
                else
                    editForm.val(value);
                editForm.change();
            }
            else
                form.find('#' + $(this).data('form')).val($(this).text());
        }
    });
}
function view(obj, callback) {
    var form = $('#' + callback + 'Form');
    var row = $(obj).parents("tr");
    form.children("#id").val(row.data('id'));
    row.children("td").each(function(index) {
        if (typeof $(this).data('val') !== 'undefined') {
            var value = $(this).data('val');
            var valIgnore = typeof $(this).data('valignore') !== 'undefined' && $(this).data('valignore');
            var viewForm = form.find('#' + $(this).data('form')+'_view');
            if (valIgnore) {
                viewForm.html($(this).html());
            } else
            if ((value.toString().substr(0, 1) == '[' || Array.isArray(value))) {
                var vals;
                if (Array.isArray(value))
                    vals = value;
                else
                    vals = JSON.parse(value);
                viewForm.text('');
                for(var i = 0; i < vals.length; i++) {
                    viewForm.html(viewForm.html() + '<a href="'+url_ctx+'tutor/edit/'+vals[i]+'">'+$('#'+$(this).data('form')+' option[value='+vals[i]+']').text()+'</a><br/>');
                }
                //$('#'+$(this).data('form')+' ')
            }
        else
            viewForm.text(value);
            //editForm.change();
        }
        else
            form.find('#' + $(this).data('form')+'_view').text($(this).text());
        if (typeof $(this).data('form') !== 'undefined') {
        }
    });
}
$('.modal').on('hidden.bs.modal', function () {
    $('.modal input').val('');
});
function onReady(){
    $('input.date').datepicker({
        format: "dd.mm.yyyy",
        startView: 2,
        autoclose: true,
        language: "ru"
    });
}
document.addEventListener("DOMContentLoaded", onReady);
