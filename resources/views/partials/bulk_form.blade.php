<div style="display:none">
    {!! Former::open($entityType . 's/bulk')->addClass('bulk-form') !!}
    {!! Former::text('bulk_action') !!}
    {!! Former::text('bulk_public_id') !!}
    {!! Former::close() !!}
</div>

<script type="text/javascript">
    function submitForm_{{ $entityType }}(action, id) {
        if (action == 'delete') {
            if (!confirm('{!! trans("texts.are_you_sure") !!}')) {
                return;
            }
        }

        @if (in_array($entityType, [ENTITY_ACCOUNT_GATEWAY]))
            if (action == 'archive') {
                if (!confirm('{!! trans("texts.are_you_sure") !!}')) {
                    return;
                }
            }
        @endif

        $('#bulk_public_id').val(id);
        $('#bulk_action').val(action);
        $('form.bulk-form').submit();
    }
</script>
