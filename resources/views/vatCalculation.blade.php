<x-layouts.master>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card border-0 shadow-lg rounded-lg">
                    <div class="card-body">
                        <h2 class="text-center mb-4 text-primary">VAT Calculator</h2>
                        <!-- Validation error messages -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="vatCalculatorForm" action="{{ route('vatCalculation.vatCalculate') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="amount" class="text-secondary">Amount:</label>
                                <input type="number" step="0.01" name="amount" value="{{ old('amount') }}"
                                    class="form-control" id="amount" placeholder="Enter Amount" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="vatOption" class="text-secondary">VAT Calculation Operation:</label>
                                <select class="form-control" name="vatOption" value="{{ old('vatOption') }}"
                                    id="vatOption">
                                    <option value="include">Include VAT</option>
                                    <option value="exclude">Exclude VAT</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="taxPercentage" class="text-secondary">Tax Percentage:</label>
                                <input type="number" step="0.01" class="form-control" name="taxPercentage"
                                    value="{{ old('taxPercentage') }}" id="taxPercentage"
                                    placeholder="Enter Tax Percentage" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-3">Calculate</button>
                        </form>
                    </div>
                    <!-- Result -->
                    @if(session()->has('isInclude'))
                        <div class="card-footer bg-primary text-white" id="result">
                            <div class="alert alert-success">
                                <p class="mb-2">Amount: {{ session('amount') }}</p>
                                <p class="mb-2">VAT: {{ session('taxPercentage') }}%</p>
                                <p class="mb-2">Operation:
                                    {{ session('vatOption') === 'include' ? 'Include VAT' : 'Exclude VAT' }}
                                </p>
                                <p class="mb-2">{{ session('vatOption') === 'include' ? 'VAT added' : 'VAT subtracted' }}:
                                    {{ session('vatAmount') }}</p>
                                <p>{{ session('isInclude') === 1 ? 'Gross Amount' : 'Net Amount' }}:
                                    {{ session('isInclude') === 1 ? session('grossAmount') : session('netAmount') }}</p>

                            </div>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>

</x-layouts.master>
