<?php

namespace Jiny\Html\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Jiny\Html\Tables\CTable;
use Jiny\Html\Tables\CRow;
use Jiny\Html\Tables\CCol;
use Jiny\Html\Tables\CColHeader;
use Jiny\Html\Tables\CTableInfo;

class TablesTest extends TestCase
{
    public function test_ctable_creates_table_element()
    {
        $table = new CTable();
        $output = $table->toString();
        $this->assertStringContainsString('<table>', $output);
        $this->assertStringContainsString('</table>', $output);
    }

    public function test_crow_creates_tr_element()
    {
        $row = new CRow();
        $output = $row->toString();
        $this->assertStringContainsString('<tr>', $output);
        $this->assertStringContainsString('</tr>', $output);
    }

    public function test_ccol_creates_td_element()
    {
        $col = new CCol('Cell Content');
        $output = $col->toString();
        $this->assertStringContainsString('<td>Cell Content</td>', $output);
    }

    public function test_ccolheader_creates_th_element()
    {
        $header = new CColHeader('Header');
        $output = $header->toString();
        $this->assertStringContainsString('<th>Header</th>', $output);
    }

    public function test_table_with_rows_and_columns()
    {
        $table = new CTable();
        
        // Add header row
        $headerRow = new CRow();
        $headerRow->addItem([
            new CColHeader('Name'),
            new CColHeader('Email'),
            new CColHeader('Status')
        ]);
        
        // Add data row
        $dataRow = new CRow();
        $dataRow->addItem([
            new CCol('John Doe'),
            new CCol('john@example.com'),
            new CCol('Active')
        ]);
        
        $table->addItem([$headerRow, $dataRow]);
        
        $output = $table->toString();
        $this->assertStringContainsString('<table>', $output);
        $this->assertStringContainsString('<tr>', $output);
        $this->assertStringContainsString('<th>Name</th>', $output);
        $this->assertStringContainsString('<th>Email</th>', $output);
        $this->assertStringContainsString('<td>John Doe</td>', $output);
        $this->assertStringContainsString('<td>john@example.com</td>', $output);
        $this->assertStringContainsString('</table>', $output);
    }

    public function test_table_with_attributes()
    {
        $table = new CTable();
        $table->addClass('table table-striped')
              ->setAttribute('id', 'data-table');
        
        $output = $table->toString();
        $this->assertStringContainsString('class="table table-striped"', $output);
        $this->assertStringContainsString('id="data-table"', $output);
    }

    public function test_ctableinfo_creates_info_table()
    {
        $table = new CTableInfo();
        $output = $table->toString();
        $this->assertStringContainsString('<table', $output);
        // CTableInfo might have default classes or styles
    }

    public function test_row_with_mixed_columns()
    {
        $row = new CRow([
            new CColHeader('Header Cell'),
            new CCol('Regular Cell'),
            'Plain text'
        ]);
        
        $output = $row->toString();
        $this->assertStringContainsString('<th>Header Cell</th>', $output);
        $this->assertStringContainsString('<td>Regular Cell</td>', $output);
        $this->assertStringContainsString('Plain text', $output);
    }

    public function test_column_with_attributes()
    {
        $col = new CCol('Content');
        $col->setAttribute('colspan', '2')
            ->addClass('text-center');
        
        $output = $col->toString();
        $this->assertStringContainsString('colspan="2"', $output);
        $this->assertStringContainsString('class="text-center"', $output);
    }
}