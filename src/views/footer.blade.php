<footer class="main-footer" style="color: white;background-color: #222d32;">
    <!-- To the right -->
    <div class="pull-{{ cbLang('right') }} hidden-xs">
        {{ cbLang('powered_by') }} {{Session::get('appname')}}
    </div>
    <!-- Default to the left -->
    <strong>{{ cbLang('copyright') }} &copy; <?php echo date('Y') ?>. {{ cbLang('all_rights_reserved') }} .</strong>
</footer>
