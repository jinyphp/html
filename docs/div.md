# div 태그

## CDiv를 사용한 div 태그 생성

이 문서에서는 `CDiv` 클래스를 사용하여 `div` 태그를 생성하는 방법에 대해 설명합니다. `CDiv` 클래스는 `jiny/html` 패키지의 일부로, HTML 태그를 객체 지향 방식으로 생성하고 관리할 수 있게 해줍니다.

## CDiv 클래스

`CDiv` 클래스는 `CTag` 클래스를 상속받아 `div` 태그를 쉽게 생성하고 관리할 수 있도록 합니다. `CDiv` 클래스는 `div` 태그의 특화된 메서드를 추가로 제공합니다.

### 기본 사용법

`CDiv` 객체는 기본적으로 `div` 태그를 생성합니다. 생성자에서 초기 아이템을 추가할 수 있습니다:

```php
use html\src\CDiv;

$div = new CDiv("This is a div.");
echo $div->toString();
```

이 코드는 다음과 같은 HTML을 출력합니다:

```html
<div>This is a div.</div>
```

### 속성 추가

`setAttribute` 메서드를 사용하여 태그에 속성을 추가할 수 있습니다. 예를 들어, `class` 속성을 추가하려면 다음과 같이 작성합니다:

```php
$div = new CDiv("This is a container div.");
$div->setAttribute('class', 'container');
echo $div->toString();
```

이 코드는 다음과 같은 HTML을 출력합니다:

```html
<div class="container">This is a container div.</div>
```

### 이벤트 핸들러 추가

`CDiv` 클래스는 여러 가지 JavaScript 이벤트 핸들러를 추가할 수 있는 메서드를 제공합니다. 예를 들어, `onclick` 이벤트 핸들러를 추가하려면 다음과 같이 작성합니다:

```php
$div = new CDiv("Click me");
$div->onClick("alert('Div clicked!')");
echo $div->toString();
```

이 코드는 다음과 같은 HTML을 출력합니다:

```html
<div onclick="alert('Div clicked!')">Click me</div>
```

### 여러 아이템 추가

`addItem` 메서드를 여러 번 호출하여 태그 내부에 여러 아이템을 추가할 수 있습니다. 다음은 `div` 태그 내부에 여러 아이템을 추가하는 예제입니다:

```php
$div = new CDiv();
$div->addItem("First item.");
$div->addItem("Second item.");
echo $div->toString();
```

이 코드는 다음과 같은 HTML을 출력합니다:

```html
<div>First item.Second item.</div>
```

### 중첩된 태그

다른 `CDiv` 객체를 `addItem` 메서드를 통해 중첩하여 추가할 수 있습니다. 다음은 `div` 태그 내부에 또 다른 `div` 태그를 추가하는 예제입니다:

```php
$outerDiv = new CDiv();
$innerDiv = new CDiv("This is an inner div.");
$outerDiv->addItem($innerDiv);
echo $outerDiv->toString();
```

이 코드는 다음과 같은 HTML을 출력합니다:

```html
<div><div>This is an inner div.</div></div>
```

### 가로폭 설정

`CDiv` 클래스는 `setWidth`와 `setAdaptiveWidth` 메서드를 사용하여 `div` 태그의 가로폭을 설정할 수 있습니다:

```php
$div = new CDiv("This div has a fixed width.");
$div->setWidth(300); // 단위는 기본값인 px
echo $div->toString();
```

이 코드는 다음과 같은 HTML을 출력합니다:

```html
<div style="width: 300px;">This div has a fixed width.</div>
```

```php
$div = new CDiv("This div has an adaptive width.");
$div->setAdaptiveWidth(300); // 단위는 기본값인 px
echo $div->toString();
```

이 코드는 다음과 같은 HTML을 출력합니다:

```html
<div style="max-width: 300px; width: 100%;">This div has an adaptive width.</div>
```

### 전체 예제

다음은 다양한 기능을 활용하여 `div` 태그를 생성하는 전체 예제입니다:

```php
use Jiny\Html\CDiv;

$div = new CDiv();
$div->setAttribute('class', 'container');
$div->setAttribute('id', 'mainContainer');
$div->onClick("alert('Container clicked!')");
$div->addItem("This is a container div.");
$div->setWidth(500);

$innerDiv = new CDiv("This is an inner div.");
$innerDiv->setAttribute('class', 'inner');
$div->addItem($innerDiv);

echo $div->toString();
```

이 코드는 다음과 같은 HTML을 출력합니다:

```html
<div class="container" id="mainContainer" onclick="alert('Container clicked!')" style="width: 500px;">This is a container div.<div class="inner">This is an inner div.</div></div>
```

이 문서에서는 `CDiv` 클래스를 사용하여 `div` 태그를 생성하고, 속성 및 이벤트 핸들러를 추가하며, 중첩된 태그를 관리하는 방법에 대해 설명했습니다. `CDiv` 클래스를 활용하면 복잡한 HTML 구조를 객체 지향 방식으로 쉽게 생성할 수 있습니다.