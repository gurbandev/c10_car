<form action="{{ url()->current() }}" method="get">
    <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <select class="form-select" name="brand_id" id="brand">
            <option value selected>-</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}" {{ $brand->id == $brand_id ? 'selected':'' }}>
                    {{ $brand->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="color" class="form-label">Color</label>
        <select class="form-select" name="color_id" id="color">
            <option value selected>-</option>
            @foreach($colors as $color)
                <option value="{{ $color->id }}" {{ $color->id == $color_id ? 'selected':'' }}>
                    {{ $color->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Year</label>
        <select class="form-select" name="year_id" id="year">
            <option value selected>-</option>
            @foreach($years as $year)
                <option value="{{ $year->id }}" {{ $year->id == $year_id ? 'selected':'' }}>
                    {{ $year->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <select class="form-select" name="location_id" id="location">
            <option value selected>-</option>
            @foreach($locations as $location)
                <option value="{{ $location->id }}" {{ $location->id == $location_id ? 'selected':'' }}>
                    {{ $location->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="row g-2">
        <div class="col">
            <button type="submit" class="btn btn-dark w-100">Filter</button>
        </div>
        <div class="col-auto">
            <a href="{{ url()->current() }}" class="btn btn-light w-100">Clear</a>
        </div>
    </div>
</form>