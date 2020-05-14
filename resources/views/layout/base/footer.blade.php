<footer id="footer" class="p25l m70t">
    <div class="row m0">
        <div class="d-none d-sm-block col-md-9 text-center text-body text-md-left fw-bold">
            {{ trans('attributes.index.copyright') }} &copy; <script>document.write(new Date().getFullYear());</script> {{ trans('attributes.index.copy_right') }} by {{ trans('attributes.common.school') }}
        </div>
        <div class="col-8 col-md-2 text-center text-md-right fw-bold fs14"><a class="show-policy-modal" href="{{ route(USER_HOME) }}">{{__('attributes.index.menu.introduce')}}</a></div>
        <div class="col-3 col-md-1 text-center text-md-left fw-bold fs14 div-show-rules"><a class="show-rules-modal" href="{{ route(USER_CONTACT) }}">{{__('attributes.index.menu.contact')}}</a></div>
    </div>
</footer>