@props([
    'headers'    => [],
    'alignments' => [],    // per-column: 'left' | 'center' | 'right'
    'rows'       => [],    // array of arrays, OR collection of objects with label/value/is_note
    'dense'      => false,
    'highlight'  => true,  // when true, last column gets orange/note styling (2-col data tables)
    'scroll'     => false, // wrap in overflow-x-auto for wide tables
    // 2-column shortcut props
    'col1'       => null,
    'col2'       => null,
])

@php
  // Normalise headers from shortcut props
  if (empty($headers) && $col1 !== null) {
      $headers    = [$col1, $col2 ?? ''];
      $alignments = $alignments ?: ['left', 'right'];
  }

  $colCount = count($headers);

  $gridClass = match ($colCount) {
      2       => 'grid-cols-2',
      3       => 'grid-cols-3',
      4       => 'grid-cols-4',
      5       => 'grid-cols-5',
      default => 'grid-cols-' . $colCount,
  };

  $px       = $dense ? 'px-5' : 'px-6';
  $pyHeader = $dense ? 'py-3' : 'py-3.5';
  $pyRow    = $dense ? 'py-3' : 'py-4';
  $textSize = $dense ? 'text-xs' : 'text-sm';

  $alignClass = function (int $i) use ($alignments): string {
      return match ($alignments[$i] ?? 'left') {
          'center' => 'text-center',
          'right'  => 'text-right',
          default  => '',
      };
  };

  $cellClass = function (int $i, array $cells, bool $isNote) use ($colCount, $highlight, $textSize, $alignClass): string {
      $isLast  = $i === $colCount - 1;
      $isFirst = $i === 0;

      if ($isFirst) {
          $base = "{$textSize} font-semibold text-tei-blue-dark";
      } elseif ($highlight && $isLast) {
          $base = $isNote
              ? "{$textSize} text-tei-gray-light italic"
              : "{$textSize} font-black text-tei-orange";
      } else {
          $base = "{$textSize} text-tei-gray";
      }

      return trim($base . ' ' . $alignClass($i));
  };
@endphp

<div @class(['overflow-x-auto' => $scroll])>
  <div class="rounded-2xl overflow-hidden border border-tei-blue/8 bg-white {{ $scroll ? 'min-w-max' : '' }}">

    {{-- Header --}}
    <div class="grid {{ $gridClass }} bg-tei-blue {{ $px }} {{ $pyHeader }}">
      @foreach ($headers as $i => $header)
        <p class="text-xs font-bold text-white/80 uppercase tracking-wider {{ $alignClass($i) }}">
          {{ $header }}
        </p>
      @endforeach
    </div>

    {{-- Rows --}}
    @foreach ($rows as $row)
      @php
        if (is_array($row)) {
            $cells  = array_values($row);
            $isNote = false;
        } else {
            $cells  = [$row->label, $row->value];
            $isNote = (bool) ($row->is_note ?? false);
        }
      @endphp
      <div class="grid {{ $gridClass }} {{ $px }} {{ $pyRow }} border-b border-tei-blue/6 last:border-0
                  {{ $loop->even ? 'bg-tei-surface' : 'bg-white' }}">
        @foreach ($cells as $i => $cell)
          <p class="{{ $cellClass($i, $cells, $isNote) }}">{{ $cell }}</p>
        @endforeach
      </div>
    @endforeach

  </div>
</div>
