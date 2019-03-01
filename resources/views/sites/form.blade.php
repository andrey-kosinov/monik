
    <!-- Display Validation Errors -->
    @include('common.errors')

    <form action="{{ url('site') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{ $site->id ?? '' }}">

        <!-- URL -->
        <div class="form-group">
            <label for="url" class="control-label">URL:</label>
            <div>
                <input type="text" name="url" id="url" class="form-control" value="{{ old('url') ?? $site->url ?? '' }}">
            </div>
        </div>

        <!-- Add  Button -->
        <div class="form-group">
                <button type="submit" class="btn btn-info">
                    <i class="fa fa-btn fa-plus"></i> Save URL
                </button>
            </div>
        </div>
    </form>
