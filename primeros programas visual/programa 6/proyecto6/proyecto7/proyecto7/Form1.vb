Public Class Form1
    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        If ComboBox1.SelectedIndex > -1 Then
            Dim sindex As Integer
            sindex = ComboBox1.SelectedIndex
            Dim sitem As Object
            sitem = ComboBox1.SelectedItem
            ListBox1.Items.Add(sitem)
        End If
    End Sub

    'populates the list
    Private Sub Button2_Click(sender As Object, e As EventArgs) Handles ComboBox1.Click
        ComboBox1.Items.Clear()
        ComboBox1.Items.Add("Macarrones")
        ComboBox1.Items.Add("Arroz")
        ComboBox1.Items.Add("Pollo")
        ComboBox1.Items.Add("Lentejas")
        ComboBox1.Items.Add("Pizza")
        ComboBox1.Items.Add("Chorizo")
        ComboBox1.Items.Add("Pan")
        ComboBox1.Items.Add("Pescado")
        ComboBox1.Items.Add("Queso")
        ComboBox1.Text = "Select from..."
    End Sub
    'sorting the list

    Private Sub Button3_Click(sender As Object, e As EventArgs)
        ComboBox1.Sorted = True
    End Sub
    'clears the list

    Private Sub Button4_Click(sender As Object, e As EventArgs)
        ComboBox1.Items.Clear()
    End Sub
    'displaying the selected item on the label

    'Private Sub ComboBox1_SelectedIndexChanged(sender As Object, e As EventArgs) _
    'Handles ListBox1.SelectedIndexChanged
    '  Label1.Text = ComboBox1.SelectedItem.ToString()
    'End Sub
End Class
