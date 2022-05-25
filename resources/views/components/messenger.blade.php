
@php
  $auth_user_id = Auth::user()->id;
@endphp

<script type="text/javascript">
  var authUserId = @json($auth_user_id);
</script>

<script src="<?php echo url('public/js/messenger.js')?>"></script>