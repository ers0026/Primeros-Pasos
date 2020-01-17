Public Class Form1
    Private Sub B_Calcular_Click(sender As Object, e As EventArgs) Handles B_Calcular.Click
        If CaK.Checked Then
            Text_GraFinal.Text = (CDbl(Text_GraOriginal.Text + 273.15))
        ElseIf KaC.Checked Then
            Text_GraFinal.Text = (CDbl(Text_GraOriginal.Text - 273.15))
        End If 'Cierra la condición
    End Sub

    Private Sub B_Reinicio_Click(sender As Object, e As EventArgs) Handles B_Reinicio.Click
        Text_GraOriginal.Text = ""
        Text_GraFinal.Text = ""
    End Sub

    Private Sub B_Salir_Click(sender As Object, e As EventArgs) Handles B_Salir.Click
        End
    End Sub
End Class
