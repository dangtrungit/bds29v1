<div class="form-group row col-md-6 col-12">
    <label for="staticEmail" class="col-form-label col-12 col-lg-2">Từ:</label>
    <div class="col-12 col-lg-9">
        <input 
        style="border:none" 
        id="date-picker" 
        class="date-picker form-control" 
        type="text" 
        name="time[{{$index}}][start_at]" 
        value="{{Carbon\Carbon::parse( $survey->start_at)->format('d/m/Y H:i') ?? '01/01/2000 10:00'}}"
        > 
    </div>
</div>

