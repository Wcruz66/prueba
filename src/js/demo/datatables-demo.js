// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#dataTable").DataTable({
    order: [[0, "desc"]],
    responsive: true,
    search: {
      regex: true,
      caseInsensitive: false,
    },
  });
});
