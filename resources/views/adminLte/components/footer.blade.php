
<footer class="main-footer">
    <strong>Copyright &copy; 2026 <a href="{{ url('/') }}">DeliveryFast</a>.</strong>

    <div class="float-right d-sm-inline-block">
        <b>Version</b> {{ preg_replace('/[\\\@\;\" "]+/', '', get_general_setting('current_version')) }}
    </div>
</footer>