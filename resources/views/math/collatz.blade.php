<x-math-tool-layout>
    <x-math-tool name="Collatz Sequence Calculator">
        <x-math-tool-explanation>
            <h2>What is the Collatz Conjecture?</h2>
            <p>
                The <strong>Collatz Conjecture</strong> states that if we take any positive integer and repeatedly apply
                the following rules,
                we will eventually reach <strong>1</strong>:
            </p>
            <ul class="list-disc pl-6">
                <li><strong>If the number is even:</strong> divide it by 2.</li>
                <li><strong>If the number is odd:</strong> multiply it by 3 and add 1.</li>
            </ul>

            <h3>Example: Starting with 6</h3>
            <p>Step by step:</p>
            <ul class="list-disc pl-6">
                <li>6 → even → 6 ÷ 2 = 3</li>
                <li>3 → odd → (3 × 3) + 1 = 10</li>
                <li>10 → even → 10 ÷ 2 = 5</li>
                <li>5 → odd → (5 × 3) + 1 = 16</li>
                <li>16 → even → 16 ÷ 2 = 8</li>
                <li>8 → even → 8 ÷ 2 = 4</li>
                <li>4 → even → 4 ÷ 2 = 2</li>
                <li>2 → even → 2 ÷ 2 = 1</li>
            </ul>

            <p><strong>The sequence for 6 is:</strong> 6, 3, 10, 5, 16, 8, 4, 2, 1</p>
        </x-math-tool-explanation>

        <x-math-form />

        @if (isset($result))
            <div class="w-full max-w-6xl mx-auto mt-8 px-4 sm:px-6 lg:px-0">
                <h3 class="text-2xl sm:text-3xl font-bold mb-4 text-gray-800">Collatz Sequence</h3>

                <div class="mb-4 text-gray-700 text-lg sm:text-xl">
                    <span class="mr-8"><strong>Steps:</strong> {{ $result['steps'] }}</span>
                    <span><strong>Max value:</strong> {{ $result['maxValue'] }}</span>
                </div>

                <div class="bg-gradient-to-br from-slate-50 to-blue-50 rounded-2xl shadow-xl p-6 w-full border border-blue-100"
                    style="height: 420px;">
                    <canvas id="collatzChart"></canvas>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const sequence = @json($result['sequence']);
                        const maxValue = {{ $result['maxValue'] }};
                        const labels = sequence.map((_, i) => i);

                        const ctx = document.getElementById('collatzChart').getContext('2d');
                        const gradient = ctx.createLinearGradient(0, 0, 0, 420);
                        gradient.addColorStop(0, 'rgba(54,162,235,0.4)');
                        gradient.addColorStop(1, 'rgba(54,162,235,0.05)');

                        const pointBackgroundColors = sequence.map(v => v === maxValue ? 'rgba(220,53,69,1)' :
                            'rgba(54,162,235,0.9)');
                        const pointRadius = sequence.map(v => v === maxValue ? 8 : 4);

                        if (window.collatzChartInstance) window.collatzChartInstance.destroy();

                        window.collatzChartInstance = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Value',
                                    data: sequence,
                                    fill: true,
                                    backgroundColor: gradient,
                                    borderColor: 'rgba(54,162,235,1)',
                                    borderWidth: 3,
                                    tension: 0.4,
                                    pointBackgroundColor: pointBackgroundColors,
                                    pointRadius: pointRadius,
                                    pointHoverRadius: 10,
                                    pointBorderColor: '#fff',
                                    pointHoverBorderWidth: 2,
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: false
                                    },
                                    tooltip: {
                                        enabled: true,
                                        backgroundColor: '#111827',
                                        titleColor: '#fff',
                                        bodyColor: '#fff',
                                        padding: 10,
                                        callbacks: {
                                            title: function(context) {
                                                return 'Step ' + context[0].label;
                                            },
                                            label: function(context) {
                                                return 'Value: ' + context.parsed.y;
                                            }
                                        }
                                    }
                                },
                                scales: {
                                    x: {
                                        title: {
                                            display: true,
                                            text: 'Step',
                                            color: '#374151',
                                            font: {
                                                weight: 'bold'
                                            }
                                        },
                                        ticks: {
                                            color: '#4B5563',
                                            font: {
                                                size: 12
                                            }
                                        },
                                        grid: {
                                            color: 'rgba(0,0,0,0.05)'
                                        }
                                    },
                                    y: {
                                        title: {
                                            display: true,
                                            text: 'Value',
                                            color: '#374151',
                                            font: {
                                                weight: 'bold'
                                            }
                                        },
                                        ticks: {
                                            color: '#4B5563',
                                            font: {
                                                size: 12
                                            }
                                        },
                                        grid: {
                                            color: 'rgba(0,0,0,0.05)'
                                        },
                                        beginAtZero: false
                                    }
                                }
                            }
                        });
                    });
                </script>
            </div>
        @endif
    </x-math-tool>

</x-math-tool-layout>
