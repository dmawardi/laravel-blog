@if (session()->has('success'))
    <div class="fixed bottom-3 right-3 bg-blue-500 text-white py-2 px-4 rounded-xl text-sm" id="flash">
        <p>{{ session('success') }}</p>
    </div>
@endif
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to hide the div
        function hideDiv() {
            var div = document.getElementById("flash");
            div.style.display = "none";
        }

        // Set a timeout to hide the div after 10 seconds
        setTimeout(hideDiv, 10000); // 10000 milliseconds = 10 seconds
    });
</script>
