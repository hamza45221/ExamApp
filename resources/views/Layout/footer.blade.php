
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function () {
        // Add item
        $("#add-item").click(function () {
            var newItem = $("#repeater-container .repeater-item:first").clone();
            var newIndex = $("#repeater-container .repeater-item").length;

            newItem.find("input").val(""); // Clear input values
            newItem.find('.additional-fields').hide(); // Hide additional fields by default
            newItem.find('.question-type').attr('name', 'questions[' + newIndex + '][type]');
            $("#repeater-container").append(newItem);
        });

        // Remove item
        $("#repeater-container").on("click", ".remove-item", function () {
            $(this).closest(".repeater-item").remove();
        });

        // Show/hide additional fields based on question type
        $("#repeater-container").on("change", ".question-type", function () {
            var additionalFields = $(this).closest(".repeater-item").find('.additional-fields');
            if ($(this).val() === "MCQs") {
                additionalFields.show();
            } else {
                additionalFields.hide();
            }
        });

        // Submit form
        $("#repeater-form").submit(function (e) {
            // Handle form submission logic here
        });
    });

</script>

</body>
</html>
