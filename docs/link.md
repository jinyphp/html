# link 태그

## CLink를 사용한 link 태그 생성

이 문서에서는 `CLink` 클래스를 사용하여 HTML `link` 태그를 생성하는 방법에 대해 설명합니다. `CLink` 클래스는 `jiny/html` 패키지의 일부로, `a` 태그를 객체 지향 방식으로 생성하고 관리할 수 있게 해줍니다.

## CLink 클래스

`CLink` 클래스는 `CTag` 클래스를 상속받아 HTML의 `a` 태그를 쉽게 생성하고 관리할 수 있도록 합니다. `CLink` 클래스는 `a` 태그의 링크 URL, 타겟, 확인 메시지 등을 설정할 수 있는 메서드를 제공합니다.

### 기본 사용법

`CLink` 객체는 기본적으로 `a` 태그를 생성합니다. 생성자에서 링크 텍스트와 URL을 초기화할 수 있습니다:

```php
use html\src\CLink;

$link = new CLink('Click Here', 'https://example.com');
echo $link->toString();
```

이 코드는 다음과 같은 HTML을 출력합니다:

```html
<a href="https://example.com">Click Here</a>
```

### URL 설정

`setHref` 메서드 또는 `setUrl`메서드를 사용하여 `a` 태그의 `href` 속성에 링크 URL을 설정할 수 있습니다:

```php
$link = new CLink();
$link->setHref('https://example.com');
$link->addItem('Visit Example');
echo $link->toString();
```

```php
$link = new CLink();
$link->setUrl('https://example.com');
$link->addItem('Visit Example');
echo $link->toString();
```

이 코드는 다음과 같은 HTML을 출력합니다:

```html
<a href="https://example.com">Visit Example</a>
```

### 타겟 설정

`setTarget` 메서드를 사용하여 링크가 열리는 방식을 설정할 수 있습니다. 예를 들어, 새 탭에서 링크를 열려면 `_blank`를 설정합니다:

```php
$link = new CLink('Open in New Tab', 'https://example.com');
$link->setTarget('_blank');
echo $link->toString();
```

이 코드는 다음과 같은 HTML을 출력합니다:

```html
<a href="https://example.com" target="_blank">Open in New Tab</a>
```

### SID 추가

`addSID` 메서드를 사용하여 URL에 `sid` 매개변수를 추가할 수 있습니다. `sid` 매개변수는 POST 방식으로 전송됩니다. 이 기능은 주로 세션 식별자와 같은 보안 정보를 URL에 추가하는 데 사용됩니다:

```php
$link = new CLink('Secure Link', 'https://example.com');
$link->addSID();
echo $link->toString();
```

이 코드는 다음과 같은 HTML을 출력합니다 (실제 URL은 동적으로 생성됩니다):

```html
<a href="javascript:void(0)" onclick="javascript: return Confirm('Are you sure?') && redirect('https://example.com?sid=YOUR_SESSION_ID', 'post', 'sid', true)">Secure Link</a>
```

### 확인 메시지 추가

`addConfirmation` 메서드를 사용하여 링크 클릭 시 확인 메시지를 표시할 수 있습니다:

```php
$link = new CLink('Delete Item', 'https://example.com/delete');
$link->addConfirmation('Are you sure you want to delete this item?');
echo $link->toString();
```

이 코드는 다음과 같은 HTML을 출력합니다:

```html
<a href="https://example.com/delete" onclick="javascript: return Confirm('Are you sure you want to delete this item?');">Delete Item</a>
```

### 전체 예제

다음은 다양한 기능을 활용하여 `a` 태그를 생성하는 전체 예제입니다:

```php
use Jiny\Html\CLink;

$link = new CLink('Submit Form', 'https://example.com/submit');
$link->setTarget('_blank')
     ->addSID()
     ->addConfirmation('Are you sure you want to submit the form?');

echo $link->toString();
```

이 코드는 다음과 같은 HTML을 출력합니다:

```html
<a href="javascript:void(0)" onclick="javascript: return Confirm('Are you sure you want to submit the form?') && redirect('https://example.com/submit?sid=YOUR_SESSION_ID', 'post', 'sid', true)" target="_blank">Submit Form</a>
```

이 문서에서는 `CLink` 클래스를 사용하여 `a` 태그를 생성하고, URL, 타겟, 확인 메시지 등의 속성을 설정하는 방법에 대해 설명했습니다. `CLink` 클래스를 활용하면 다양한 `a` 태그를 객체 지향 방식으로 쉽게 생성하고 관리할 수 있습니다.