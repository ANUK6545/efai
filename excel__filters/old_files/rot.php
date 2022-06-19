<html>
<select name="filter" onchange="test(this); " class="noExl">
    <option disabled selected>Select a filter</option>
    <option value="Ascending">Ascending</option>
    <option value="Descending">Descending</option>
    <option value="Duplicate">Duplicate</option>
</select>

<head>
    <meta http-equiv="content-type" content="text/html;charset=Windows-1252">
    <script type="text/javascript">
        var people, asc1 = 1,
            asc2 = 1,
            asc3 = 1;
        window.onload = function() {
            people = document.getElementById("people");
        }

        function sort_table(tbody, col, asc) {
            var rows = tbody.rows,
                rlen = rows.length,
                arr = new Array(),
                i, j, cells, clen;
            // fill the array with values from the table
            for (i = 0; i < rlen; i++) {
                cells = rows[i].cells;
                clen = cells.length;
                arr[i] = new Array();
                for (j = 0; j < clen; j++) {
                    arr[i][j] = cells[j].innerHTML;
                }
            }

            // sort the array by the specified column number (col) and order (asc)
            arr.sort(function(a, b) {
                return (a[col] == b[col]) ? 0 : ((a[col] > b[col]) ? asc : -1 * asc);
            });

            // replace existing rows with new rows created from the sorted array
            for (i = 0; i < rlen; i++) {
                rows[i].innerHTML = "<td>" + arr[i].join("</td><td>") + "</td>";
            }

        }
    </script>
    <style type="text/css">
        table {
            border-collapse: collapse;
            border: none;
        }

        th,
        td {
            border: 1px solid black;
            padding: 4px 16px;
            font-family: Times New Roman;
            font-size: 24px;
            text-align: left;
        }

        th {
            background-color: #C8C8C8;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody id="people">

            <tr>
                <td>a</td>
                <td>1</td>
                <td>18</td>
            </tr>
            <tr>
                <td>c</td>
                <td>3</td>
                <td>21</td>
            </tr>
            <tr>
                <td>b</td>
                <td>2</td>
                <td>20</td>
            </tr>
            <tr>
                <td>a</td>
                <td>1</td>
                <td>18</td>
            </tr>
            <tr>
                <td>c</td>
                <td>3</td>
                <td>21</td>
            </tr>
            <tr>
                <td>b</td>
                <td>2</td>
                <td>20</td>
            </tr>

        </tbody>
    </table>

    <script>
        window.test = function(e) {
            if (e.value === 'Duplicate') {
                removeDuplicates();

            } else if (e.value === 'Ascending') {
                console.log("we");
                sort_table(people, 0, asc1);
                asc1 *= -1;
                asc2 = 1;
                asc3 = 1;

            } else if (e.value === 'Descending') {

                sort_table(people, 0, asc1);
                asc1 *= -1;
                asc2 = 1;
                asc3 = 1;

            }
        }
    </script>
    </script>


</body>

</html>