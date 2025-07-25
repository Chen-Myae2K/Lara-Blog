  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">

          @foreach ($links as $name=>$url)
              @if ($loop->last)
                  <li class="breadcrumb-item active text-capitalize" aria-current="page">{{ $name }}</li>
              @else
                  <li class="breadcrumb-item active text-capitalize" aria-current="page"><a
                          href="{{ $url }}">{{ $name }}</a></li>
              @endif
          @endforeach



      </ol>
  </nav>
