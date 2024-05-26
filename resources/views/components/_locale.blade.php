<form class="d-inline " action="{{route('set_language_locale', $lang)}}" method="POST">
      @csrf
      <button class="btn" type="submit">
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg' )}}" width="32" height="32" alt="">
      </button>
</form>