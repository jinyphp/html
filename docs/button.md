# button 태그
## HTML `button` 태그 설명

HTML의 `button` 태그는 사용자가 클릭할 수 있는 버튼을 생성합니다. 이 태그는 다양한 유형의 버튼을 생성하는 데 사용되며, 여러 속성을 통해 동작을 제어할 수 있습니다.

* Jiny\Html\Form\CButton
* Jiny\Html\Form\CButtonCancel
* Jiny\Html\Form\CButtonDelete
* Jiny\Html\Form\CButtonExport
* Jiny\Html\Form\CButtonDropdown
* Jiny\Html\Form\CButtonQMessage

### 기본 구조

```html
<button type="button">Click Me!</button>
```

### 주요 속성

- `type`: 버튼의 동작을 정의합니다. `button`, `submit`, `reset` 세 가지 값을 가질 수 있습니다.
  - `button`: 일반 버튼으로, JavaScript를 통해 동작을 정의할 수 있습니다.
  - `submit`: 폼 데이터를 서버로 제출합니다.
  - `reset`: 폼의 데이터를 초기화합니다.
- `name`: 폼 데이터가 제출될 때 서버로 전송되는 변수 이름을 정의합니다.
- `value`: 버튼의 값을 정의합니다.
- `disabled`: 버튼을 비활성화하여 사용자가 클릭할 수 없도록 합니다.
- `autofocus`: 페이지가 로드될 때 버튼에 자동으로 포커스를 설정합니다.

### 예제

#### 기본 `button` 태그

```html
<button type="button">Click Me!</button>
```

#### 폼 제출 버튼

```html
<form action="/submit" method="post">
    <button type="submit">Submit</button>
</form>
```

#### 폼 초기화 버튼

```html
<form>
    <input type="text" name="username">
    <button type="reset">Reset</button>
</form>
```

#### 비활성화된 버튼

```html
<button type="button" disabled>Can't Click Me!</button>
```

#### 버튼에 JavaScript 동작 추가

```html
<button type="button" onclick="alert('Button Clicked!')">Click Me!</button>
```

### 접근성

`button` 태그는 접근성을 위해 명확한 라벨을 가지는 것이 중요합니다. 이는 사용자가 버튼의 목적을 쉽게 이해할 수 있도록 돕습니다.

```html
<button type="button" aria-label="Close">X</button>
```

---

## `CButton` 클래스 설명

`CButton` 클래스는 HTML의 `button` 태그를 생성하고 관리하는 PHP 클래스입니다. 이 클래스는 버튼을 생성하고, 버튼의 속성을 설정하며, 다양한 유형의 버튼을 지원합니다.

### 주요 메서드 및 속성

#### 생성자

```php
public function __construct($name = 'button', $caption = '')
```

- `$name`: 버튼의 이름을 설정합니다.
- `$caption`: 버튼에 표시될 텍스트를 설정합니다.

#### `setEnabled` 메서드

```php
public function setEnabled($value)
```

- `$value`: `true`이면 버튼을 활성화하고, `false`이면 버튼을 비활성화합니다.

### 예제

#### 기본 버튼 생성

```php
$button = new CButton('myButton', 'Click Me!');
echo $button->toString();
```

#### 비활성화된 버튼 생성

```php
$button = new CButton('myButton', 'Click Me!');
$button->setEnabled(false);
echo $button->toString();
```

### `CButtonCancel` 클래스

`CButtonCancel` 클래스는 `CButton` 클래스를 상속받아 취소 버튼을 생성하는 클래스입니다.

#### 생성자

```php
public function __construct($vars = null, $action = null)
```

- `$vars`: 추가 URL 변수를 설정합니다.
- `$action`: 버튼 클릭 시 실행할 JavaScript 동작을 설정합니다.

### 예제

```php
$cancelButton = new CButtonCancel();
echo $cancelButton->toString();
```

### `CButtonDelete` 클래스

`CButtonDelete` 클래스는 `CButtonQMessage` 클래스를 상속받아 삭제 버튼을 생성하는 클래스입니다.

#### 생성자

```php
public function __construct($msg = null, $vars = null, $url_param_exclude = '')
```

- `$msg`: 삭제 확인 메시지를 설정합니다.
- `$vars`: 추가 URL 변수를 설정합니다.
- `$url_param_exclude`: URL에서 제외할 파라미터를 설정합니다.

### 예제

```php
$deleteButton = new CButtonDelete();
echo $deleteButton->toString();
```

### `CButtonDropdown` 클래스

`CButtonDropdown` 클래스는 드롭다운 버튼을 생성하는 클래스입니다.

#### 생성자

```php
public function __construct(string $name, $value = null, array $items = [], string $caption = '')
```

- `$name`: 버튼의 이름을 설정합니다.
- `$value`: 선택된 값을 설정합니다.
- `$items`: 드롭다운 항목을 설정합니다.
- `$caption`: 버튼에 표시될 텍스트를 설정합니다.

### 예제

```php
$dropdownButton = new CButtonDropdown('dropdown', 'value', [
    ['label' => 'Option 1', 'value' => '1'],
    ['label' => 'Option 2', 'value' => '2']
], 'Select an option');
echo $dropdownButton->toString();
```

### `CButtonExport` 클래스

`CButtonExport` 클래스는 내보내기 버튼을 생성하는 클래스입니다.

#### 생성자

```php
public function __construct(string $action, string $back_url)
```

- `$action`: 내보내기 액션을 설정합니다.
- `$back_url`: 내보내기 완료 후 리디렉션할 URL을 설정합니다.

### 예제

```php
$exportButton = new CButtonExport('exportAction', 'backUrl');
echo $exportButton->toString();
```

### `CButtonQMessage` 클래스

`CButtonQMessage` 클래스는 확인 메시지를 표시하는 버튼을 생성하는 클래스입니다.

#### 생성자

```php
public function __construct($name, $caption, $msg = null, $vars = null, $url_param_exclude = '')
```

- `$name`: 버튼의 이름을 설정합니다.
- `$caption`: 버튼에 표시될 텍스트를 설정합니다.
- `$msg`: 확인 메시지를 설정합니다.
- `$vars`: 추가 URL 변수를 설정합니다.
- `$url_param_exclude`: URL에서 제외할 파라미터를 설정합니다.

### 예제

```php
$qMessageButton = new CButtonQMessage('delete', 'Delete', 'Are you sure?');
echo $qMessageButton->toString();
```

### 결론

`CButton` 및 관련 클래스들은 HTML `button` 태그를 쉽게 생성하고 관리할 수 있도록 도와줍니다. 이 클래스들을 사용하면 다양한 유형의 버튼을 쉽게 생성하고, 버튼의 동작을 제어할 수 있습니다.