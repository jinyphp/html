# SVG 그래프 생성 방법

이 문서에서는 PHP를 사용하여 SVG 그래프를 생성하는 방법과 HTML 태그를 사용하여 이러한 그래프를 표시하는 방법에 대해 설명합니다. 아래 예제는 Zabbix의 SVG 그래프 생성과 관련된 PHP 클래스를 설명합니다.

## PHP 클래스 설명

### CSvgGraphAnnotation

이 클래스는 SVG 그래프에서 주석을 추가하는 데 사용됩니다. 주석에는 문제를 표시하는 다양한 스타일이 적용될 수 있습니다.

#### 주요 메서드

- `__construct($type)`: 주석의 유형을 설정합니다.
- `makeStyles()`: 주석에 필요한 스타일을 정의합니다.
- `setInformation($info)`: 주석에 대한 추가 정보를 설정합니다.
- `setColor($color)`: 주석의 색상을 설정합니다.
- `toString($destroy = true)`: 주석을 SVG 마크업으로 변환합니다.

#### 주석 유형

- `TYPE_SIMPLE`: 단순 주석.
- `TYPE_RANGE`: 범위 주석.

### CSvgGraphArea

이 클래스는 그래프에 영역을 추가하는 데 사용됩니다.

#### 주요 메서드

- `__construct($path, $metric, $y_zero = 0)`: 그래프의 경로와 메트릭을 설정합니다.
- `makeStyles()`: 영역의 스타일을 정의합니다.
- `draw()`: 영역을 그리는 SVG 경로를 반환합니다.
- `toString($destroy = true)`: 영역을 SVG 마크업으로 변환합니다.

### CSvgGraphAxis

이 클래스는 SVG 그래프에 축을 추가하는 데 사용됩니다.

#### 주요 메서드

- `__construct(array $labels, $type)`: 축의 레이블과 유형을 설정합니다.
- `makeStyles()`: 축의 스타일을 정의합니다.
- `setTextColor($color)`: 레이블 텍스트의 색상을 설정합니다.
- `setLineColor($color)`: 축 선의 색상을 설정합니다.
- `toString($destroy = true)`: 축을 SVG 마크업으로 변환합니다.

### CSvgGraphBar

이 클래스는 막대 그래프를 추가하는 데 사용됩니다.

#### 주요 메서드

- `__construct($path, $metric)`: 그래프의 경로와 메트릭을 설정합니다.
- `makeStyles()`: 막대 그래프의 스타일을 정의합니다.
- `draw()`: 막대를 그리는 SVG 마크업을 생성합니다.
- `toString($destroy = true)`: 막대를 SVG 마크업으로 변환합니다.

### CSvgGraphGrid

이 클래스는 그래프에 그리드를 추가하는 데 사용됩니다.

#### 주요 메서드

- `__construct(array $points_value, array $points_time)`: 그리드의 값을 설정합니다.
- `makeStyles()`: 그리드의 스타일을 정의합니다.
- `setPosition($x, $y)`: 그리드의 위치를 설정합니다.
- `setColor($color)`: 그리드의 색상을 설정합니다.
- `toString($destroy = true)`: 그리드를 SVG 마크업으로 변환합니다.

### CSvgGraphLegend

이 클래스는 그래프의 범례를 생성하는 데 사용됩니다.

#### 주요 메서드

- `__construct(array $labels = [])`: 범례의 레이블을 설정합니다.
- `toString($destroy = true)`: 범례를 SVG 마크업으로 변환합니다.

## HTML과 SVG 통합

SVG 그래프를 HTML 문서에 통합하려면 SVG 태그를 직접 사용하거나 위에서 설명한 PHP 클래스를 통해 동적으로 생성된 SVG 마크업을 삽입할 수 있습니다. 예를 들어, PHP에서 생성된 SVG 마크업을 HTML 파일에 포함시킬 수 있습니다.

```html
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SVG 그래프 예제</title>
</head>
<body>
    <!-- PHP 파일에서 SVG 마크업을 포함합니다 -->
    <?php
    // PHP 클래스를 사용하여 SVG 그래프를 생성합니다.
    include 'path/to/your/svg_graph_classes.php';

    $annotation = new CSvgGraphAnnotation(CSvgGraphAnnotation::TYPE_SIMPLE);
    $annotation->setColor('#FF0000')->setInformation('문제 발생');

    echo $annotation->toString();

    // 다른 그래프 요소도 생성하고 출력할 수 있습니다.
    ?>
</body>
</html>
