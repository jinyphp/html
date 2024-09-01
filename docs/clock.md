# Clock 생성

이 문서에서는 `CClock` 클래스를 사용하여 HTML에서 시계 모양의 그래픽을 생성하는 방법에 대해 자세히 설명합니다. 제공된 클래스는 SVG(Scalable Vector Graphics)를 이용해 시계를 렌더링하는 기능을 제공합니다. 

## `CClock` 클래스 개요

`CClock` 클래스는 시계를 SVG로 표현하며, 시계의 다양한 요소를 구성하는 기능을 갖추고 있습니다. 이 클래스는 다음과 같은 주요 기능을 제공합니다:

1. **시계의 크기 설정**
2. **시계의 활성화/비활성화 상태 설정**
3. **시계의 디자인 요소(시계 얼굴, 시계 바늘 등) 생성**

### 주요 속성 및 메서드

- **`$width`**: 시계의 너비를 설정합니다.
- **`$height`**: 시계의 높이를 설정합니다.
- **`$is_enabled`**: 시계의 활성화 상태를 설정합니다. 기본값은 `true`입니다.

### 주요 메서드

#### `__construct()`

- **기능**: `CDiv` 클래스를 상속받아 초기화하며, 기본적으로 `ZBX_STYLE_CLOCK` 클래스를 추가합니다.

#### `setWidth($value)`

- **기능**: 시계의 너비를 설정합니다.
- **매개변수**: 
  - `$value`: 시계의 너비 (픽셀 단위).
- **반환값**: `CClock` 객체 (메서드 체이닝 지원).

#### `setHeight($value)`

- **기능**: 시계의 높이를 설정합니다.
- **매개변수**: 
  - `$value`: 시계의 높이 (픽셀 단위).
- **반환값**: `CClock` 객체.

#### `setEnabled($is_enabled)`

- **기능**: 시계의 활성화 상태를 설정합니다.
- **매개변수**: 
  - `$is_enabled`: 시계의 활성화 상태 (true 또는 false).
- **반환값**: `CClock` 객체.

#### `toString($destroy = true)`

- **기능**: 시계의 SVG를 문자열로 변환하여 출력합니다.
- **매개변수**: 
  - `$destroy`: 객체 사용 후 삭제 여부 (기본값: true).
- **반환값**: SVG 문자열.

### 내부 메서드

- **`makeClockLine($width, $height, $x, $y, $deg)`**: 시계의 눈금을 생성합니다.
- **`makeClockFace()`**: 시계의 얼굴을 생성합니다.
- **`makeClockHands()`**: 시계의 바늘을 생성합니다.
- **`build()`**: 시계의 SVG 구조를 생성합니다.

## HTML에서의 활용 예제

`CClock` 클래스를 사용하여 웹 페이지에서 시계를 생성하고 표시할 수 있습니다. 아래는 `CClock` 클래스를 사용한 HTML 및 PHP 코드 예제입니다.

### PHP 코드 예제

```php
<?php
// CClock 클래스를 사용하여 시계를 생성하는 예제

// CClock 클래스를 포함합니다 (경로는 실제 경로로 조정해야 함)
require_once 'CClock.php';

// 새로운 CClock 객체 생성
$clock = new CClock();

// 시계의 너비와 높이 설정
$clock->setWidth(200);
$clock->setHeight(200);

// 시계를 비활성화 상태로 설정 (비활성화된 시계는 스타일이 적용됨)
$clock->setEnabled(false);

// 시계의 SVG를 문자열로 변환하여 출력
echo $clock->toString();
?>
```

### HTML에서의 활용

위의 PHP 코드를 HTML 페이지에서 사용할 수 있습니다. PHP 코드를 HTML 내에 삽입하면 SVG 시계가 표시됩니다. 아래는 HTML 페이지 내에서 PHP 코드를 포함하는 방법입니다.

```html
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>시계 예제</title>
    <style>
        /* 스타일을 통해 시계의 외관을 조정할 수 있습니다 */
        .clock {
            border: 1px solid #000; /* 시계에 테두리를 추가 */
            display: inline-block;
            margin: 20px;
        }
    </style>
</head>
<body>
    <h1>SVG 시계 예제</h1>
    
    <!-- PHP 코드를 포함하여 시계를 출력합니다 -->
    <div class="clock">
        <?php
        // PHP 코드 포함
        require_once 'CClock.php';

        $clock = new CClock();
        $clock->setWidth(200);
        $clock->setHeight(200);
        $clock->setEnabled(true);
        echo $clock->toString();
        ?>
    </div>
</body>
</html>
```

### 설명

- **CSS**: `.clock` 클래스를 사용하여 시계에 테두리와 여백을 추가할 수 있습니다. CSS를 통해 시계의 외관을 더욱 세밀하게 조정할 수 있습니다.
- **PHP 코드**: `require_once 'CClock.php';`를 통해 `CClock` 클래스를 포함한 후, `CClock` 객체를 생성하고 속성을 설정합니다. `toString()` 메서드를 호출하여 시계의 SVG를 문자열로 변환하고, 이를 HTML 내에 출력합니다.

이 예제를 통해 PHP와 SVG를 사용하여 웹 페이지에 시계를 효과적으로 표시할 수 있습니다. `CClock` 클래스를 활용하면 시계의 디자인과 스타일을 자유롭게 조정할 수 있으며, 동적으로 시계를 생성할 수 있습니다.