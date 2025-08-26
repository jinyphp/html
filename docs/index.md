# Jiny HTML 문서

`jiny/html`는 서버사이드 HTML 코드를 객체 지향적으로 생성할 수 있는 Laravel 패키지입니다. 복잡한 HTML 구조를 데이터 기반으로 안전하고 유지보수하기 쉽게 빌드할 수 있습니다.

## 개요

이 패키지는 PHP 객체를 사용하여 HTML 요소를 생성하는 방법을 제공합니다. 각 HTML 태그는 해당하는 PHP 클래스로 표현되며, 메서드 체이닝을 통해 속성을 설정하고 내용을 추가할 수 있습니다.

## 핵심 개념

### 1. 기본 구조

모든 HTML 컴포넌트는 `CTag` 클래스를 기반으로 합니다:

```php
use Jiny\Html\CTag;

// 기본 사용법
$tag = new CTag('tagname', $hasBody, $content);
```

### 2. 메서드 체이닝

대부분의 메서드는 `$this`를 반환하여 체이닝을 지원합니다:

```php
$element = (new CDiv())
    ->setAttribute('class', 'container')
    ->setAttribute('id', 'main-content')
    ->setBodyContent('Hello World');
```

### 3. 자동 이스케이프

모든 컨텐츠는 XSS 방지를 위해 자동으로 이스케이프됩니다:

```php
$div = new CDiv();
$div->setBodyContent('<script>alert("xss")</script>');
// 출력: <div>&lt;script&gt;alert("xss")&lt;/script&gt;</div>
```

## 컴포넌트 카테고리

### 기본 컴포넌트
- [CTag](./tag.md) - 모든 HTML 태그의 기본 클래스
- [CDiv](./div.md) - DIV 요소
- [CSpan](./span.md) - SPAN 요소  
- [CLink](./link.md) - 링크 요소

### 폼 컴포넌트
- [CForm](./form.md) - 폼 컨테이너
- [CInput](./input.md) - 입력 필드
- [CSelect](./select.md) - 선택 박스
- [CButton](./button.md) - 버튼 요소

### 테이블 컴포넌트
- [CTable](./table.md) - 테이블 구조
- [CRow](./table.md#crow) - 테이블 행
- [CCol](./table.md#ccol) - 테이블 열

### 고급 컴포넌트
- [CSvg](./svg.md) - SVG 요소
- [CWidget](./widget.md) - 커스텀 위젯

## 시작하기

1. **설치**: `composer require jiny/html`
2. **기본 사용법**: [기본 컴포넌트 가이드](./basic.md)
3. **폼 만들기**: [폼 컴포넌트 가이드](./form.md)
4. **테이블 만들기**: [테이블 컴포넌트 가이드](./table.md)

## 예제

### 간단한 HTML 생성

```php
use Jiny\Html\CDiv;
use Jiny\Html\CSpan;

$container = new CDiv();
$container->setAttribute('class', 'container');

$title = new CSpan();
$title->setAttribute('class', 'title')
      ->setBodyContent('안녕하세요!');

$container->addItem($title);

echo $container;
// 출력: <div class="container"><span class="title">안녕하세요!</span></div>
```

### 조건부 렌더링

```php
$alert = new CDiv();
$alert->setAttribute('class', $isError ? 'alert-danger' : 'alert-success');
$alert->setBodyContent($isError ? '오류가 발생했습니다!' : '성공했습니다!');
```

## 성능 고려사항

- 객체 생성 비용을 최소화하기 위해 필요한 경우에만 컴포넌트를 생성하세요
- 대량의 데이터를 처리할 때는 적절한 캐싱을 고려하세요
- 복잡한 구조는 Blade 템플릿과 함께 사용하는 것을 권장합니다

## 디버깅

개발 중에는 `toString()` 메서드를 명시적으로 호출하여 생성된 HTML을 확인할 수 있습니다:

```php
$element = new CDiv();
$element->setAttribute('class', 'test');
var_dump($element->toString()); // HTML 출력 확인
```

