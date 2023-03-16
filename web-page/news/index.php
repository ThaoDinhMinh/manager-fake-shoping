<div class="container">
    <h3 class="mt-4">Tất cả sản phẩm</h3><br />
    <div id="pagination_data">
    </div>

</div>
<script>
    $(document).ready(function() {
        load_data();

        function load_data(page_load) {
            $.ajax({
                url: "web-page/news/pagination.php",
                method: "POST",
                data: {
                    pages: page_load
                },
                success: function(data) {
                    $('#pagination_data').html(data);
                }
            })
        }
        $(document).on('click', '.pagination_link', function() {
            var page_load = $(this).attr("id");
            load_data(page_load);
        });

    });
</script>