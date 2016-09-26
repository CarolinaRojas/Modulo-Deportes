$(document).ready(function () {
    ApoyoData();
});
function ApoyoData() {
    $('#ApoyoData').DataTable({
        retrieve: true,
        select: true,
        "responsive": true,
        "ordering": true,
        "info": false,
        "language": {
            url: 'public/DataTables/Spanish.json',
            searchPlaceholder: "Buscar"
        }
    });
}
