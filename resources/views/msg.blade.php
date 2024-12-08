@if(!@empty(session('success')))
<div class="alert alert-success alert-dismissible fade show" role="alert"">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>
@endif

@if(!empty(session('error')))
<div class="alert alert-danger alert-dismissible fade show" role="alert"">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif    
<script>
    // Wait for the DOM to fully load
    document.addEventListener('DOMContentLoaded', function () {
        // Find all alert elements
        const alerts = document.querySelectorAll('.alert');

        // Set a timeout to remove each alert after 3 seconds
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.classList.remove('show'); // Bootstrap 'fade out' animation
                alert.classList.add('fade');   // Fade out effect
                setTimeout(() => alert.remove(), 500); // Remove the element completely
            }, 2000);
        });
    });
</script>
