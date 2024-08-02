# input 태그

이 문서는 `CInput` 클래스를 사용하여 HTML `input` 태그를 생성하고 관리하는 방법에 대해 설명합니다. `CInput` 클래스는 Laravel 환경에서 사용할 수 있도록 설계된 객체 지향적인 HTML 태그 생성기입니다.

## input 태그 개요

HTML의 `input` 태그는 사용자로부터 데이터를 입력받을 때 사용됩니다. 다양한 유형의 입력을 지원하며, 예를 들어 텍스트, 비밀번호, 이메일, 날짜 등을 받을 수 있습니다.

기본 문법:
```html
<input type="text" name="username" value="John Doe">
```

## CInput 클래스 설명

`CInput` 클래스는 `input` 태그를 객체 지향적으로 생성하고 관리하기 위한 여러 메서드를 제공합니다. 이를 통해 코드의 재사용성과 가독성을 높일 수 있습니다.

### 클래스 생성자

`CInput` 객체는 다음과 같은 생성자를 통해 생성할 수 있습니다:
```php
use html\src\Form\CInput;

$input = new CInput('text', 'username', 'John Doe');
```
- `type`: 입력 필드의 유형 (기본값: 'text')
- `name`: 입력 필드의 이름
- `value`: 입력 필드의 초기 값

### 주요 메서드

#### setType($type)
입력 필드의 유형을 설정합니다.
```php
$input->setType('password');
```

#### setReadonly($value)
입력 필드를 읽기 전용으로 설정합니다.
```php
$input->setReadonly(true);
```

#### disableAutocomplete()
입력 필드의 자동 완성을 비활성화합니다.
```php
$input->disableAutocomplete();
```

#### setEnabled($value)
입력 필드를 활성화 또는 비활성화합니다.
```php
$input->setEnabled(false);
```

#### setMaxLength($max)
입력 필드의 최대 입력 허용 글자수를 설정합니다.
```php
$input->setMaxLength(50);
```

#### setPlaceholder($value)
입력 필드에 placeholder 텍스트를 설정합니다.
```php
$input->setPlaceholder('Enter your username');
```

#### setValue($value)
입력 필드의 값을 설정합니다.
```php
$input->setValue('John Doe');
```

### 예제 코드

다음은 `CInput` 클래스를 사용하여 다양한 설정을 적용한 `input` 태그를 생성하는 예제입니다:

```php
use Jiny\Html\Form\CInput;

// 텍스트 입력 필드 생성
$input = new CInput('text', 'username', 'John Doe');
$input->setMaxLength(50)
      ->setPlaceholder('Enter your username')
      ->disableAutocomplete();

// 출력
echo $input->toString();
```

이 코드는 다음과 같은 HTML을 출력합니다:
```html
<input type="text" name="username" value="John Doe" maxlength="50" placeholder="Enter your username" autocomplete="off">
```


## 비밀 입력 필드

### CInputSecret 클래스

`CInputSecret` 클래스는 비밀번호와 같은 보안 정보를 입력받기 위해 사용되는 `input` 태그를 생성합니다. 이 클래스는 `CInput` 클래스를 상속받아 다양한 추가 기능을 제공합니다.

#### 사용 예제

```php
use html\Form\CInputSecret;

// 비밀 정보 입력 필드 생성
$inputSecret = new CInputSecret('password', 'default_password');
echo $inputSecret->toString();
```

### 주요 기능

- 기본 CSS 클래스 이름을 `input-secret`으로 설정합니다.
- 값 변경 버튼에 대한 스타일을 설정할 수 있습니다.
- 초기화 자바스크립트 코드를 추가할 수 있습니다.

### 주요 메서드

- `getPostJS()`: 초기화 자바스크립트 코드를 반환합니다.
- `toString($destroy = true)`: 객체를 문자열로 변환합니다.

#### 사용 예제

```php
use html\Form\CInputSecret;

// 비밀 정보 입력 필드 생성
$inputSecret = new CInputSecret('password');
echo $inputSecret->toString();
```

위 코드는 HTML에서 비밀 입력 필드를 생성하고, 필요에 따라 초기화 자바스크립트 코드를 추가합니다.

### 구성 요소

- `ZBX_STYLE_CLASS`: 기본 CSS 클래스 이름.
- `ZBX_STYLE_BTN_CHANGE`: 값 변경 버튼 스타일.
- `add_post_js`: 초기화 자바스크립트 코드 추가 여부.

### 메서드 설명

- `getPostJS()`: 초기화 자바스크립트 코드를 반환합니다.
- `toString($destroy = true)`: 객체를 문자열로 변환하여 HTML 태그로 반환합니다.

위 설명을 참고하여 `CInput`과 `CInputSecret` 클래스를 사용해 다양한 `input` 태그를 생성하고 관리할 수 있습니다.