# SVG 태그 및 도형 그리기

## 1. SVG 태그란?
SVG(Scalable Vector Graphics)는 XML 기반의 벡터 이미지 포맷으로, 웹에서 그래픽을 표현하는 데 사용됩니다. 벡터 이미지이기 때문에 크기와 해상도에 관계없이 선명하게 렌더링되며, 브라우저에서 직접 SVG 태그를 사용해 그래픽을 그릴 수 있습니다.

**기본 구조:**
```html
<svg width="100" height="100">
  <circle cx="50" cy="50" r="40" stroke="black" stroke-width="3" fill="red" />
</svg>
```
이 예제는 중심이 `(50, 50)`이고 반지름이 `40px`인 빨간색 원을 그립니다. SVG는 다양한 도형(`circle`, `rect`, `line`, `polygon`, `path` 등)을 지원합니다.

## 2. PHP 클래스를 이용한 SVG 생성
아래 PHP 클래스들은 다양한 SVG 요소를 객체 지향 방식으로 생성하고 관리할 수 있도록 돕습니다. 이 클래스들을 이용하면 코드에서 직접 SVG를 생성하고 조작할 수 있습니다.

### 2.1 `CSvg` 클래스
`CSvg` 클래스는 SVG 전체 컨테이너를 나타내며, SVG 요소의 크기 및 기본 속성을 설정하는 데 사용됩니다.

```php
$svg = new CSvg();
$svg->setSize(400, 300); // SVG의 크기 설정
```

### 2.2 `CSvgCircle` 클래스
이 클래스는 원(`circle`) 요소를 생성합니다.

```php
$circle = new CSvgCircle(50, 50, 80); // 중심이 (50, 50)이고, 지름이 80인 원
$svg->addItem($circle); // SVG에 원 추가
```

### 2.3 `CSvgLine` 클래스
이 클래스는 선(`line`) 요소를 생성합니다.

```php
$line = new CSvgLine(10, 10, 100, 100); // 시작점이 (10, 10)이고 끝점이 (100, 100)인 선
$svg->addItem($line); // SVG에 선 추가
```

### 2.4 `CSvgRect` 클래스
이 클래스는 사각형(`rect`) 요소를 생성합니다.

```php
$rect = new CSvgRect(20, 30, 150, 100); // 좌측 상단이 (20, 30)이고 크기가 150x100인 사각형
$svg->addItem($rect); // SVG에 사각형 추가
```

### 2.5 `CSvgPolygon` 클래스
이 클래스는 다각형(`polygon`) 요소를 생성합니다.

```php
$polygon = new CSvgPolygon([[10, 10], [100, 10], [50, 80]]); // 삼각형 좌표들
$svg->addItem($polygon); // SVG에 다각형 추가
```

### 2.6 `CSvgPath` 클래스
이 클래스는 경로(`path`) 요소를 생성하며, 복잡한 도형을 그릴 때 유용합니다.

```php
$path = new CSvgPath();
$path->moveTo(10, 10)
     ->lineTo(100, 100)
     ->lineTo(50, 150)
     ->closePath(); // 경로 닫기
$svg->addItem($path); // SVG에 경로 추가
```

## 3. 전체 예제
위의 클래스를 이용해 SVG 요소들을 결합하여 복합적인 그래픽을 생성할 수 있습니다.

```php
$svg = new CSvg();
$svg->setSize(400, 300);

$circle = new CSvgCircle(50, 50, 80);
$rect = new CSvgRect(120, 30, 150, 100);
$line = new CSvgLine(0, 0, 400, 300);
$polygon = new CSvgPolygon([[200, 10], [250, 190], [160, 210]]);
$path = new CSvgPath();
$path->moveTo(300, 50)->lineTo(350, 100)->lineTo(250, 100)->closePath();

$svg->addItem($circle)
    ->addItem($rect)
    ->addItem($line)
    ->addItem($polygon)
    ->addItem($path);

echo $svg->toString();
```

이 예제는 다양한 SVG 요소들을 결합하여 복합적인 그래픽을 생성하고 이를 문자열로 변환해 HTML에서 사용할 수 있는 형태로 만듭니다. PHP 클래스 기반의 SVG 생성은 코드 재사용성, 가독성, 유지보수성 측면에서 매우 유용합니다.