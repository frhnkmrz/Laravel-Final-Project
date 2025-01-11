<h3>Milestones</h3>
@foreach($grant->milestones as $milestone)
    <div>
        <strong>{{ $milestone->milestone_name }}</strong><br>
        Target Completion Date: {{ $milestone->target_completion_date }}<br>
        Status: {{ $milestone->status }}<br>
        Deliverable: {{ $milestone->deliverable }}<br>
        Remark: {{ $milestone->remark }}<br>
        Last Updated: {{ $milestone->updated_at ?? 'Not yet updated' }}<br>
        <a href="{{ route('milestones.edit', [$grant->id, $milestone->id]) }}" class="btn btn-sm btn-warning">Edit</a>
    </div>
@endforeach
