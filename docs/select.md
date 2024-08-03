# select 태그
`CSelect` 클래스는 select 요소를 생성합니다. 또한 select는 `CSelectOption` 클래스와 한쌍으로 사용을 해야 합니다.
이 문서에서는 기본 `select` 태그와 옵션, 옵션 그룹을 생성하는 방법에 대해 설명합니다.

* Jiny\Html\Form\CSelect
* Jiny\Html\Form\CSelectOption
* Jiny\Html\Form\CSelectOptionGroup

## 헬퍼함수
`xSelect()` 함수를 제공합니다.


## HTML `select` 태그 설명

HTML의 `select` 태그는 드롭다운 목록을 만들기 위해 사용됩니다. 이 태그는 여러 옵션을 제공하여 사용자가 선택할 수 있도록 합니다. 각 옵션은 `option` 태그로 정의됩니다. `select` 태그는 폼 요소의 중요한 부분으로, 주로 사용자 입력을 수집하는 데 사용됩니다.

### 기본 구조

```html
<select name="fruits">
    <option value="apple">Apple</option>
    <option value="banana">Banana</option>
    <option value="cherry">Cherry</option>
</select>
```

### 주요 속성

- `name`: 폼 데이터가 제출될 때 서버로 전송되는 변수 이름을 정의합니다.
- `id`: 고유 식별자를 지정하여 JavaScript 및 CSS에서 요소를 참조할 수 있습니다.
- `multiple`: 이 속성을 설정하면 사용자가 여러 옵션을 선택할 수 있습니다.
- `size`: 표시되는 옵션의 수를 지정합니다.
- `disabled`: `select` 태그를 비활성화하여 사용자가 선택할 수 없도록 합니다.
- `autofocus`: 페이지가 로드될 때 `select` 태그에 자동으로 포커스를 설정합니다.

### `option` 태그

`option` 태그는 `select` 태그 내에서 개별 옵션을 정의합니다.

#### 주요 속성

- `value`: 서버로 전송되는 옵션의 값을 정의합니다.
- `selected`: 이 속성을 사용하여 기본적으로 선택된 옵션을 설정합니다.
- `disabled`: 옵션을 비활성화하여 선택할 수 없도록 합니다.

### 예제

#### 기본 `select` 태그

```html
<form>
    <label for="fruits">Choose a fruit:</label>
    <select name="fruits" id="fruits">
        <option value="apple">Apple</option>
        <option value="banana">Banana</option>
        <option value="cherry">Cherry</option>
    </select>
</form>
```

#### 다중 선택 가능한 `select` 태그

```html
<form>
    <label for="fruits">Choose fruits:</label>
    <select name="fruits" id="fruits" multiple size="3">
        <option value="apple">Apple</option>
        <option value="banana">Banana</option>
        <option value="cherry">Cherry</option>
        <option value="date">Date</option>
    </select>
</form>
```

#### 비활성화된 옵션 포함

```html
<form>
    <label for="fruits">Choose a fruit:</label>
    <select name="fruits" id="fruits">
        <option value="apple">Apple</option>
        <option value="banana" disabled>Banana</option>
        <option value="cherry">Cherry</option>
    </select>
</form>
```

#### 기본 선택된 옵션

```html
<form>
    <label for="fruits">Choose a fruit:</label>
    <select name="fruits" id="fruits">
        <option value="apple">Apple</option>
        <option value="banana" selected>Banana</option>
        <option value="cherry">Cherry</option>
    </select>
</form>
```

### 참고

`select` 태그는 접근성을 위해 `label` 태그와 함께 사용되는 것이 좋습니다. 이는 사용자가 쉽게 이해하고 사용할 수 있도록 돕습니다.

```html
<label for="fruits">Choose a fruit:</label>
<select name="fruits" id="fruits">
    <option value="apple">Apple</option>
    <option value="banana">Banana</option>
    <option value="cherry">Cherry</option>
</select>
```


## 기본 `select` 태그
### CSelect 클래스

`CSelect` 클래스는 HTML의 `select` 태그를 생성하기 위한 기본 클래스로, 다양한 속성을 설정할 수 있습니다.

#### 사용 예제

```php
use html\Form\CSelect;

// Select 태그 생성
$select = new CSelect('fruits');
$select->addOption('Apple', 'apple');
$select->addOption('Banana', 'banana');
$select->addOption('Cherry', 'cherry');
echo $select->toString();
```

### 주요 메서드

- `__construct(string $name, $value = null)`: `select` 태그를 생성하고 이름과 초기 값을 설정합니다.
- `setValue($value)`: 선택된 값을 설정합니다.
- `setDisabled(bool $value = true)`: `select` 태그를 비활성화하거나 활성화합니다.
- `setReadonly(bool $value = true)`: `select` 태그를 읽기 전용으로 설정하거나 해제합니다.
- `setName($name)`: `select` 태그의 이름을 설정합니다.
- `setWidth($value)`: `select` 태그의 너비를 설정합니다.
- `setAdaptiveWidth($value)`: `select` 태그의 적응형 너비를 설정합니다.
- `addOption($label, $value = null)`: 옵션을 추가합니다.
- `addOptions(array $options)`: 여러 옵션을 추가합니다.

## 옵션 추가

### CSelectOption 클래스

`CSelectOption` 클래스는 `select` 태그의 개별 옵션을 설명합니다.

#### 사용 예제

```php
use html\Form\CSelectOption;

// Option 생성
$option = new CSelectOption('apple', 'Apple');
$option->setExtra('data-color', 'red');
$option->setDisabled(false);
$option->addClass('fruit-option');
echo json_encode($option->toArray());
```

### 주요 메서드

- `__construct($value, string $label)`: 옵션을 생성하고 값과 레이블을 설정합니다.
- `setExtra(string $key, string $value)`: 추가 데이터를 설정합니다.
- `setDisabled(bool $value = true)`: 옵션을 비활성화하거나 활성화합니다.
- `addClass(?string $class_name)`: CSS 클래스를 추가합니다.
- `toArray()`: 객체를 연관 배열로 변환합니다.

## 옵션 그룹 추가

### CSelectOptionGroup 클래스

`CSelectOptionGroup` 클래스는 `select` 태그의 옵션 그룹을 설명합니다.

#### 사용 예제

```php
use html\Form\CSelectOptionGroup;
use html\Form\CSelectOption;

// Option 그룹 생성
$group = new CSelectOptionGroup('Citrus Fruits');
$group->addOption(new CSelectOption('orange', 'Orange'));
$group->addOption(new CSelectOption('lemon', 'Lemon'));
echo json_encode($group->toArray());
```

### 주요 메서드

- `__construct(string $label)`: 옵션 그룹을 생성하고 레이블을 설정합니다.
- `addOptions(array $options)`: 여러 옵션을 추가합니다.
- `addOption(CSelectOption $option)`: 개별 옵션을 추가합니다.
- `setOptionTemplate(string $template)`: 옵션 그룹의 커스텀 템플릿을 설정합니다.
- `toArray()`: 객체를 연관 배열로 변환합니다.

### 구성 요소

#### CSelect 클래스
- `name`: `select` 태그의 이름.
- `value`: 선택된 값.
- `options`: `select` 태그에 추가된 옵션들.

#### CSelectOption 클래스
- `label`: 옵션의 레이블.
- `value`: 옵션의 값.
- `extra`: 옵션에 추가된 임의의 데이터.
- `class_names`: 옵션에 추가된 CSS 클래스들.
- `disabled`: 옵션의 비활성화 여부.

#### CSelectOptionGroup 클래스
- `label`: 옵션 그룹의 레이블.
- `options`: 옵션 그룹에 포함된 옵션들.
- `option_template`: 옵션 그룹의 커스텀 템플릿.

위 설명을 참고하여 `CSelect` 클래스와 관련된 서브 클래스를 사용해 다양한 `select` 태그를 생성하고 관리할 수 있습니다.