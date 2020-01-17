Class MainWindow
    Const Pi As Single = 3.141592654
    Dim R, H, V As Single
    REM Declaración de variables
    Dim Precio1, Precio2, Precio3 As Single
    Dim Media = 3


    REM Cálculo y muestra resultados
    Private Sub Button_Click(ByVal sender As System.Object, ByVal e As System.EventArgs)
        Precio1 = Val(TextBox1.Text)
        Precio2 = Val(TextBox2.Text)
        Precio3 = Val(TextBox3.Text)
        Media = (Precio1 + Precio2 + Precio3) / Media
        LabelResultados.Text = "El precio medio del producto es de " & Media & " euros"
    End Sub
End Class

