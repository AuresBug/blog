  <script>
    $(document).ready(function() {


      var table = $('#{{ $element_id }}').DataTable({
        serverSide: true,
        pageLength: 25,
        language: {
          url: '{{ asset('vendor/datatables/es-mx.json') }}'
        },
        ajax: "{{ $url }}",
        order: [
          {!! $order ?? "[0, 'desc']" !!}
        ],
        columns: [
          //     {
          //     name: 'id'
          //   },
          @include('share.fields_datatables')
        ],
      });
    });
  </script>
