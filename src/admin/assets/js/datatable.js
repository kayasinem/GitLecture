$('#myTable').DataTable({
    language: {
        info: "_TOTAL_ kayıttan _START_ - _END_ kayıt gösteriliyor.",
        infoEmpty:      "Gösterilecek hiç kayıt yok.",
        loadingRecords: "Kayıtlar yükleniyor.",
        zeroRecords: "Tablo boş",
        search: "Arama:",
        infoFiltered:   "(toplam _MAX_ kayıttan filtrelenenler)",
        buttons: {
            copyTitle: "Panoya kopyalandı.",
            copySuccess:"Panoya %d satır kopyalandı",
            copy: "Kopyala",
            print: "Yazdır",
        },

        paginate: {
            first: "İlk",
            previous: "Önceki",
            next: "Sonraki",
            last: "Son"
        },
    },
    dom: 'Bfrtip',
    buttons: [
        'copy', 'excel', 'pdf', 'print'
    ],
    responsive: true
});
