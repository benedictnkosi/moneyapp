$(document).ready(function() {
   
    // Create an inline menu by calling
    // .MonthPicker(); on a <div> or <span> tag.
    $("#InlineMenu").MonthPicker({
        SelectedMonth: '04/' + new Date().getFullYear(),
        OnAfterChooseMonth: function(selectedDate) {
            // Do something with selected JavaScript date.
            // console.log(selectedDate);
        }
    });



});
