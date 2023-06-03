@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/prismjs/prism.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="row">
    <div class="example">
      <nav aria-label="Page navigation example">
        <ul class="pagination mb-0 pagination-separated">
          <li class="page-item disabled">
            <a class="page-link" href="javascript:;" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="javascript:;">1</a></li>
          <li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
          <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
          <li class="page-item">
            <a class="page-link" href="javascript:;">Next</a>
          </li>
        </ul>
      </nav>
    </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/prismjs/prism.js') }}"></script>
  <script src="{{ asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
@endpush